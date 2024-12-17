<?php

namespace App\Filament\Resources\CheServerResource\Pages;

use App\Filament\Resources\CheServerResource;
use App\Models\CheServer;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ManageRecords;

class ListCheServers extends ManageRecords
{
    protected static string $resource = CheServerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Sync Servers Resources')->action(function () {
                $findCheServers = CheServer::all();
                if ($findCheServers->count() > 0) {
                    foreach ($findCheServers as $cheServer) {
                        $cheServer->syncResources();
                    }
                }
            }),
            Actions\CreateAction::make(),
        ];
    }
}
