<?php

namespace App\Filament\Resources\CidadesResource\Pages;

use App\Filament\Resources\CidadesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCidades extends CreateRecord
{
    protected static string $resource = CidadesResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
