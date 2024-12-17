<?php

namespace App\Models;

use App\ApiSDK\CheApiSDK;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;

    protected $fillable = [
        'che_server_id',
        'name',
        'username',
        'password',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'company',
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {

            $model->password = Hash::make($model->password);
        });


        static::creating(function ($model) {

            $model->password = Hash::make($model->password);

            if ($model->che_server_id > 0) {
                $cheServer = CheServer::where('id', $model->che_server_id)->first();
                if ($cheServer) {
                    $cheApiSDK = new CheApiSDK($cheServer->ip, 8443, $cheServer->username, $cheServer->password);
                    $createCustomer = $cheApiSDK->createCustomer([
                        'name' => $model->name,
                        'username' => $model->username,
                        'password' => $model->password,
                        'email' => $model->email,
                        'phone' => $model->phone,
                        'address' => $model->address,
                        'city' => $model->city,
                        'state' => $model->state,
                        'zip' => $model->zip,
                        'country' => $model->country,
                        'company' => $model->company,
                    ]);
                    if (isset($createCustomer['data']['customer']['id'])) {
                        $model->external_id = $createCustomer['data']['customer']['id'];
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        });

        static::deleting(function ($model) {});
    }

    public function hostingSubscriptions()
    {
        return $this->hasMany(HostingSubscription::class);
    }

    public function canBeImpersonated()
    {
        return true;
    }
}
