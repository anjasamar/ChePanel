<?php

namespace App\Listeners;


use App\Events\ModelCheServerCreated;
use App\Models\CheServer;
use Illuminate\Remote\Connection;
use phpseclib3\Net\SSH2;
use Spatie\Ssh\Ssh;

class ModelCheServerCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ModelCheServerCreated $event): void
    {
        $findCheServer =  CheServer::where('id', $event->model->id)->first();
        if (!$findCheServer) {
            return;
        }
        if ($findCheServer->status == 'installing') {
            return;
        }
        $username = $event->model->username;
        $password = $event->model->password;
        $ip = $event->model->ip;

        $ssh = new SSH2($ip);
        if ($ssh->login($username, $password)) {

            $ssh->exec('wget https://raw.githubusercontent.com/anjasamar/ChePanel/main/installers/install.sh');
            $ssh->exec('chmod +x install.sh');
            $ssh->exec('./install.sh  >che-install.log 2>&1 </dev/null &');

            $findCheServer->status = 'installing';
            $findCheServer->save();
        } else {
            $findCheServer->status = 'can\'t connect to server';
            $findCheServer->save();
        }
    }
}
