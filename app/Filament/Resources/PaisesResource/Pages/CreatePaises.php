<?php

namespace App\Filament\Resources\PaisesResource\Pages;

use App\Filament\Resources\PaisResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaises extends CreateRecord
{
    protected static string $resource = PaisResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
