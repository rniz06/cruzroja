<?php

namespace App\Filament\Resources\ConductorResource\Pages;

use App\Filament\Resources\ConductorResource;
use App\Models\Conductor\Estado as ConductorEstado;
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
        $estado_activo = ConductorEstado::where('estado', 'ACTIVO')->first();
        // Usar interpolación de cadenas para nombre completo
        $data['nombre_completo'] = "{$data['nombres']} {$data['apellidos']}";
        $data['conductor_estado_id'] = $estado_activo->id_conductor_estado;

        return $data;
    }
}
