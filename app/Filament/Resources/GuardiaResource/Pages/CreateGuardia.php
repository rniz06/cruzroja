<?php

namespace App\Filament\Resources\GuardiaResource\Pages;

use App\Filament\Resources\GuardiaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGuardia extends CreateRecord
{
    protected static string $resource = GuardiaResource::class;

    protected static ?string $title = 'Registrar Guardia';
}
