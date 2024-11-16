<?php

namespace App\Filament\Resources\ConductorResource\Pages;

use App\Filament\Resources\ConductorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConductors extends ListRecords
{
    protected static string $resource = ConductorResource::class;

    protected static ?string $title = 'Conductores';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Añadir Conductor'),
        ];
    }
}
