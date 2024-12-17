<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateChe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'che:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Che to the latest version.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating Che...');

        $output = '';
        $output .= exec('mkdir -p /usr/local/che/update');
        $output .= exec('wget https://raw.githubusercontent.com/anjasamar/ChePanel/main/update/update-web-panel.sh -O /usr/local/che/update/update-web-panel.sh');
        $output .= exec('chmod +x /usr/local/che/update/update-web-panel.sh');

        $this->info($output);

        shell_exec('bash /usr/local/che/update/update-web-panel.sh');

        $this->info('Che updated successfully.');
    }
}
