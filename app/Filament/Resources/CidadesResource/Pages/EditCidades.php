<?php

namespace App\Filament\Resources\CidadesResource\Pages;

use App\Filament\Resources\CidadesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCidades extends EditRecord
{
    protected static string $resource = CidadesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
