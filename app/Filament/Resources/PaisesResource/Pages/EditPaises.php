<?php

namespace App\Filament\Resources\PaisesResource\Pages;

use App\Filament\Resources\PaisResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPaises extends EditRecord
{
    protected static string $resource = PaisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
