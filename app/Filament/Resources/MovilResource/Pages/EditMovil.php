<?php

namespace App\Filament\Resources\MovilResource\Pages;

use App\Filament\Resources\MovilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMovil extends EditRecord
{
    protected static string $resource = MovilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return MovilResource::getUrl('index');
    }
}
