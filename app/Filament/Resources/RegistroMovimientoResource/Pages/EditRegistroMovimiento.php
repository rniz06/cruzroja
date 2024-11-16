<?php

namespace App\Filament\Resources\RegistroMovimientoResource\Pages;

use App\Filament\Resources\RegistroMovimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistroMovimiento extends EditRecord
{
    protected static string $resource = RegistroMovimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected static ?string $title = 'Editar Registro Movimiento';

    protected function getRedirectUrl(): string
    {
        return RegistroMovimientoResource::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $kmRecorrido =  $data['km_final'] - $data['km_inicial'];

        $data['km_recorrido'] = $kmRecorrido;

        return $data;
    }
}
