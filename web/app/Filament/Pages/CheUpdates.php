<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CheUpdates extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    protected static string $view = 'filament.pages.updates';

    protected static ?string $navigationGroup = 'Server Management';

    protected static ?string $navigationLabel = 'Updates';

    protected static ?int $navigationSort = 1;

    protected static bool $shouldRegisterNavigation = false;

    public $logFilePath = '/usr/local/che/update/update.log';

    public function startUpdate()
    {
        // Start update

        $output = '';
        $output .= exec('mkdir -p /usr/local/che/update');
        $output .= exec('wget https://raw.githubusercontent.com/anjasamar/ChePanel/main/update/update-web-panel.sh -O /usr/local/che/update/update-web-panel.sh');
        $output .= exec('chmod +x /usr/local/che/update/update-web-panel.sh');
        $output .= shell_exec('bash /usr/local/che/update/update-web-panel.sh >> ' . $this->logFilePath . ' &');

        return redirect('/admin/update-log');
    }

    protected function getViewData(): array
    {
        return [];
    }
}
