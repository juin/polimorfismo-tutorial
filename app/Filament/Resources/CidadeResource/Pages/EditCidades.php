<?php

namespace App\Filament\Resources\CidadesResource\Pages;

use App\Filament\Resources\CidadeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCidades extends EditRecord
{
    protected static string $resource = CidadeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
