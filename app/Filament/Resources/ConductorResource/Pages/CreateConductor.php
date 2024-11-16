<?php

namespace App\Filament\Resources\ConductorResource\Pages;

use App\Filament\Resources\ConductorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConductor extends CreateRecord
{
    protected static string $resource = ConductorResource::class;

    protected static ?string $title = 'Añadir Conductor';

    protected function getRedirectUrl(): string
    {
        return ConductorResource::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $nombreCompleto =  $data['nombres'] . ' ' . $data['apellidos'];

        $data['nombre_completo'] = $nombreCompleto;

        return $data;
    }
}
