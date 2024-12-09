<?php

namespace App\Filament\Resources\MovilResource\Pages;

use App\Filament\Resources\MovilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMovils extends ListRecords
{
    protected static string $resource = MovilResource::class;

    protected static ?string $title = 'Moviles';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Añadir Movil'),
        ];
    }
}
