<?php

namespace App\Filament\Resources\EstadosResource\Pages;

use App\Filament\Resources\EstadoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEstados extends CreateRecord
{
    protected static string $resource = EstadoResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
