<?php

namespace App\Filament\Resources\RegistroMovimientoResource\Pages;

use App\Filament\Resources\RegistroMovimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistroMovimientos extends ListRecords
{
    protected static string $resource = RegistroMovimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Registrar Movimiento'),
        ];
    }
}
