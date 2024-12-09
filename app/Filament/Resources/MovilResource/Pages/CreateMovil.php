<?php

namespace App\Filament\Resources\MovilResource\Pages;

use App\Filament\Resources\MovilResource;
use App\Models\Moviles\Estado as MovilEstado;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMovil extends CreateRecord
{
    protected static string $resource = MovilResource::class;

    protected static ?string $title = 'Añadir Móvil';

    protected function getRedirectUrl(): string
    {
        return MovilResource::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $estado_activo = MovilEstado::where('movil_estado', 'ACTIVO')->first();
        $data['movil_estado_id'] = $estado_activo->id_movil_estado;

        return $data;
    }
}
