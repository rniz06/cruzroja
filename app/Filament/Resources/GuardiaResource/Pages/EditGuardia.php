<?php

namespace App\Filament\Resources\GuardiaResource\Pages;

use App\Filament\Resources\GuardiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuardia extends EditRecord
{
    protected static string $resource = GuardiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected static ?string $title = 'Editar Registro de Guardia';
}
