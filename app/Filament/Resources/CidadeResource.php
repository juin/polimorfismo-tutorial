<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CidadesResource\Pages;
use App\Models\Cidade;
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

class CidadeResource extends Resource
{
    protected static ?string $model = Cidade::class;

    protected static ?string $slug = 'cidades';

    protected static ?string $label = 'Cidade';

    protected static ?string $pluralLabel = 'Cidades';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Locais';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                    ->required(),

               Select::make('estado_id')
                   ->relationship('estado', 'nome'),

                Placeholder::make('created_at')
                    ->label('Data/Hora Cadastro')
                    ->content(fn(?Cidade $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Data/Hora Última Atualização')
                    ->content(fn(?Cidade $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome'),

                TextColumn::make('estado.sigla'),
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
            'index' => Pages\ListCidades::route('/'),
            'create' => Pages\CreateCidades::route('/create'),
            'edit' => Pages\EditCidades::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
