<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstadoResource\RelationManagers\CoordenadoresRelationManager;
use App\Filament\Resources\EstadosResource\Pages;
use App\Models\Estado;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EstadoResource extends Resource
{
    protected static ?string $model = Estado::class;

    protected static ?string $slug = 'estados';

    protected static ?string $label = 'Estado';

    protected static ?string $pluralLabel = 'Estados';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Locais';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                    ->required(),

                TextInput::make('sigla')
                    ->length(2)
                    ->required(),

                Select::make('pais_id')
                    ->label('País')
                    ->relationship('pais', 'nome')->required(),

                Placeholder::make('created_at')
                    ->label('Data/Hora Cadastro')
                    ->content(fn(?Estado $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Data/Hora Última Atualização')
                    ->content(fn(?Estado $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome'),

                TextColumn::make('sigla'),

                TextColumn::make('pais.nome'),
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
            'index' => Pages\ListEstados::route('/'),
            'create' => Pages\CreateEstados::route('/create'),
            'edit' => Pages\EditEstados::route('/{record}/edit'),
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
