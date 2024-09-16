<?php

namespace App\Filament\Resources\CoordenadorResource\Pages;

use App\Filament\Resources\CoordenadorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCoordenadors extends ListRecords
{
    protected static string $resource = CoordenadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
