<?php

namespace App\Filament\Resources\GuardiaResource\Pages;

use App\Filament\Resources\GuardiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuardias extends ListRecords
{
    protected static string $resource = GuardiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
