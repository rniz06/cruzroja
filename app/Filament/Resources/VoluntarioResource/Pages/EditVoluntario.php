<?php

namespace App\Filament\Resources\VoluntarioResource\Pages;

use App\Filament\Resources\VoluntarioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVoluntario extends EditRecord
{
    protected static string $resource = VoluntarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected static ?string $title = 'Editar Registro de Voluntario';

    protected function getRedirectUrl(): string
    {
        return VoluntarioResource::getUrl('index');
    }
}
