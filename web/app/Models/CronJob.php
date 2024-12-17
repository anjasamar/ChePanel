<?php

namespace App\Models;

use App\Models\Scopes\CustomerHostingSubscriptionScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CronJob extends Model
{
    protected $fillable = [
        'schedule',
        'command',
        'user',
        'hosting_subscription_id'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new CustomerHostingSubscriptionScope());
    }

    public function hostingSubscription()
    {
        return $this->belongsTo(HostingSubscription::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->hosting_subscription_id) {
                $hostingSubscription = HostingSubscription::where('id', $model->hosting_subscription_id)->first();
                if ($hostingSubscription) {
                    $model->user = $hostingSubscription->system_username;
                }
            }
            $allCronJobs = [];
            $oldCronJobs = self::where('user', $model->user)->get();
            foreach ($oldCronJobs as $oldCronJob) {
                $allCronJobs[$oldCronJob->user][] = $oldCronJob->toArray();
            }
            $allCronJobs[$model->user][] = $model->toArray();

            $model->configureCronJobs($allCronJobs);
        });

        static::updating(function ($model) {
            $allCronJobs = [];
            $oldCronJobs = self::where('user', $model->user)->get();
            foreach ($oldCronJobs as $oldCronJob) {
                if ($oldCronJob->id == $model->id) {
                    $allCronJobs[$model->user][] = $model->toArray();
                    continue;
                }
                $allCronJobs[$oldCronJob->user][] = $oldCronJob->toArray();
            }
            $model->configureCronJobs($allCronJobs);
        });

        static::deleting(function ($model) {
            $allCronJobs = [];
            $oldCronJobs = self::where('user', $model->user)->get();
            foreach ($oldCronJobs as $oldCronJob) {
                if ($oldCronJob->id == $model->id) {
                    continue;
                }
                $allCronJobs[$oldCronJob->user][] = $oldCronJob->toArray();
            }

            $model->configureCronJobs($allCronJobs);
        });
    }
    public function configureCronJobs($cronJobs)
    {
        $now = now();
        $user = $this->user;
        $cronContent = <<<EOT
        # ChePanel Cron Jobs
        # User: $user
        # Generated at: $now
        # Do not edit this file manually, it is automaticly generated by ChePanel
        EOT;
        $cronContent .= PHP_EOL . PHP_EOL;

        if (!empty($cronJobs)) {
            foreach ($cronJobs as $user => $cronJobs) {
                foreach ($cronJobs as $cronJob) {
                    $cronContent .= $cronJob['schedule'] . ' ' . $cronJob['command'] . PHP_EOL;
                }
            }
        }

        $cronContent .= PHP_EOL;
        $cronFile = '/tmp/crontab-' . $user;
        file_put_contents($cronFile, $cronContent);

        $output = shell_exec('crontab -u ' . $user . ' ' . $cronFile);
        unlink($cronFile);

        return false;
    }
}