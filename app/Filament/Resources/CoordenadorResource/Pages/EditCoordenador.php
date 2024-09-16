<?php

namespace App\Filament\Resources\CoordenadorResource\Pages;

use App\Filament\Resources\CoordenadorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCoordenador extends EditRecord
{
    protected static string $resource = CoordenadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
