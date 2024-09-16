<?php

namespace App\Filament\Resources\PaisesResource\Pages;

use App\Filament\Resources\PaisesResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaises extends CreateRecord
{
    protected static string $resource = PaisesResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
