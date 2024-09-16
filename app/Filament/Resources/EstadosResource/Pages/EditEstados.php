<?php

namespace App\Filament\Resources\EstadosResource\Pages;

use App\Filament\Resources\EstadoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEstados extends EditRecord
{
    protected static string $resource = EstadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
