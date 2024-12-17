<?php

namespace App\Models;

use App\ApiSDK\CheApiSDK;
use App\Events\ModelCheServerCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpseclib3\Net\SSH2;

class CheServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'port',
        'username',
        'password',
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            event(new ModelCheServerCreated($model));
        });
    }

    public function syncResources()
    {
        // Sync customers
        $centralServerCustomerExternalIds = [];
        $getCentralServerCustomers = Customer::where('che_server_id', $this->id)->get();
        if ($getCentralServerCustomers->count() > 0) {
            foreach ($getCentralServerCustomers as $customer) {
                $centralServerCustomerExternalIds[] = $customer->external_id;
            }
        }

        $cheApiSDK = new CheApiSDK($this->ip, 8443, $this->username, $this->password);
        $getCheServerCustomers = $cheApiSDK->getCustomers();
        if (isset($getCheServerCustomers['data']['customers'])) {
            $cheServerCustomerIds = [];
            foreach ($getCheServerCustomers['data']['customers'] as $customer) {
                $cheServerCustomerIds[] = $customer['id'];
            }

            // Delete customers to main server that are not in external server
            foreach ($centralServerCustomerExternalIds as $centralServerCustomerExternalId) {
                if (!in_array($centralServerCustomerExternalId, $cheServerCustomerIds)) {
                    $getCustomer = Customer::where('external_id', $centralServerCustomerExternalId)
                        ->where('che_server_id', $this->id)
                        ->first();
                    if ($getCustomer) {
                        $getCustomer->delete();
                    }
                }
            }

            // Add customers to main server from external server
            foreach ($getCheServerCustomers['data']['customers'] as $cheServerCustomer) {
                $findCustomer = Customer::where('external_id', $cheServerCustomer['id'])
                    ->where('che_server_id', $this->id)
                    ->first();
                if (!$findCustomer) {
                    $findCustomer = new Customer();
                    $findCustomer->che_server_id = $this->id;
                    $findCustomer->external_id = $cheServerCustomer['id'];
                }
                $findCustomer->name = $cheServerCustomer['name'];
                $findCustomer->username = $cheServerCustomer['username'];
                $findCustomer->email = $cheServerCustomer['email'];
                $findCustomer->phone = $cheServerCustomer['phone'];
                $findCustomer->address = $cheServerCustomer['address'];
                $findCustomer->city = $cheServerCustomer['city'];
                $findCustomer->state = $cheServerCustomer['state'];
                $findCustomer->zip = $cheServerCustomer['zip'];
                $findCustomer->country = $cheServerCustomer['country'];
                $findCustomer->company = $cheServerCustomer['company'];
                $findCustomer->saveQuietly();
            }
        }

        // Sync Hosting Subscriptions
        $centralServerHostingSubscriptionsExternalIds = [];
        $getCentralHostingSubscriptions = HostingSubscription::where('che_server_id', $this->id)->get();
        if ($getCentralHostingSubscriptions->count() > 0) {
            foreach ($getCentralHostingSubscriptions as $customer) {
                $centralServerHostingSubscriptionsExternalIds[] = $customer->external_id;
            }
        }
        $getCheServerHostingSubscriptions = $cheApiSDK->getHostingSubscriptions();
        if (isset($getCheServerHostingSubscriptions['data']['HostingSubscriptions'])) {
            foreach ($getCheServerHostingSubscriptions['data']['HostingSubscriptions'] as $cheServerHostingSubscription) {

                $findHostingSubscription = HostingSubscription::where('external_id', $cheServerHostingSubscription['id'])
                    ->where('che_server_id', $this->id)
                    ->first();
                if (!$findHostingSubscription) {
                    $findHostingSubscription = new HostingSubscription();
                    $findHostingSubscription->che_server_id = $this->id;
                    $findHostingSubscription->external_id = $cheServerHostingSubscription['id'];
                }

                $findHostingSubscriptionCustomer = Customer::where('external_id', $cheServerHostingSubscription['customer_id'])
                    ->where('che_server_id', $this->id)
                    ->first();
                if ($findHostingSubscriptionCustomer) {
                    $findHostingSubscription->customer_id = $findHostingSubscriptionCustomer->id;
                }

                $findHostingSubscription->system_username = $cheServerHostingSubscription['system_username'];
                $findHostingSubscription->system_password = $cheServerHostingSubscription['system_password'];

                $findHostingSubscription->domain = $cheServerHostingSubscription['domain'];
                $findHostingSubscription->save();
            }
        }


        //        // Sync Hosting Plans
        //        $getHostingPlans = HostingPlan::all();
        //        if ($getHostingPlans->count() > 0) {
        //            foreach ($getHostingPlans as $hostingPlan) {
        //
        //            }
        //        }
    }

    public function updateServer()
    {
        $ssh = new SSH2($this->ip);
        if ($ssh->login($this->username, $this->password)) {
            //
            //            $output = $ssh->exec('cd /usr/local/che/web && /usr/local/che/php/bin/php artisan apache:ping-websites-with-curl');
            //            dd($output);

            $output = '';
            $output .= $ssh->exec('wget https://raw.githubusercontent.com/anjasamar/ChePanel/main/update/update-web-panel.sh -O /usr/local/che/update/update-web-panel.sh');
            $output .= $ssh->exec('chmod +x /usr/local/che/update/update-web-panel.sh');
            $output .= $ssh->exec('/usr/local/che/update/update-web-panel.sh');

            dd($output);

            $this->healthCheck();
        }
    }

    public function healthCheck()
    {
        try {
            $cheApiSDK = new CheApiSDK($this->ip, 8443, $this->username, $this->password);
            $response = $cheApiSDK->healthCheck();
            if (isset($response['status']) && $response['status'] == 'ok') {
                $this->status = 'Online';
                $this->save();
            } else {
                $this->status = 'Offline';
                $this->save();
            }
        } catch (\Exception $e) {
            $this->status = 'Offline';
            $this->save();
        }
    }
}
