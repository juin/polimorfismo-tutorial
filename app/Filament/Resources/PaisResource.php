<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaisesResource\Pages;
use App\Filament\Resources\PaisResource\RelationManagers\CoordenadoresRelationManager;
use App\Models\Pais;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaisResource extends Resource
{
    protected static ?string $model = Pais::class;

    protected static ?string $slug = 'paises';

    protected static ?string $label = 'País';

    protected static ?string $pluralLabel = 'Paises';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Locais';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                    ->required()->columnSpan(2),

                Placeholder::make('created_at')
                    ->label('Data/Hora Cadastro')
                    ->content(fn(?Pais $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Data/Hora Última Atualização')
                    ->content(fn(?Pais $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaises::route('/'),
            'create' => Pages\CreatePaises::route('/create'),
            'edit' => Pages\EditPaises::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            CoordenadoresRelationManager::class,
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
