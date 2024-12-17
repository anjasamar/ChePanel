<?php

namespace App\Filament\Resources\CheServerResource\Pages;

use App\Filament\Resources\CheServerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheServer extends EditRecord
{
    protected static string $resource = CheServerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
