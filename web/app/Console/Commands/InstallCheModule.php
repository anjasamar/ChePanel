<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCheModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'che:install-module {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install a Che module.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Installing Che module...');

        $modulePath = base_path('Modules/' . $this->argument('module'));
        if (!is_dir($modulePath)) {
            $this->error('Module not found.');
            return;
        }
        $postInstallPath = $modulePath . '/PostInstall.php';
        if (!file_exists($postInstallPath)) {
            $this->error('PostInstall.php not found.');
            return;
        }
        $postInstall = app()->make('Modules\\' . $this->argument('module') . '\\PostInstall');
        if (!method_exists($postInstall, 'run')) {
            $this->error('PostInstall::run() not found.');
            return;
        }
        $postInstall->run();

        $this->info('Che module installed successfully.');
    }
}
