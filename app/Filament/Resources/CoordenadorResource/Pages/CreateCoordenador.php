<?php

namespace App\Filament\Resources\CoordenadorResource\Pages;

use App\Filament\Resources\CoordenadorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCoordenador extends CreateRecord
{
    protected static string $resource = CoordenadorResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
