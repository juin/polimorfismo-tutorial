<?php

namespace App\Filament\Resources\CidadesResource\Pages;

use App\Filament\Resources\CidadeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCidades extends CreateRecord
{
    protected static string $resource = CidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
