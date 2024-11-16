<?php

namespace App\Filament\Resources\MovilResource\Pages;

use App\Filament\Resources\MovilResource;
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
}
