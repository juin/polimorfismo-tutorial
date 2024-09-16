<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoordenadorResource\Pages;
use App\Models\Cidade;
use App\Models\Coordenador;
use App\Models\Estado;
use App\Models\Pais;
use Filament\Forms\Components\MorphToSelect;
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
use Illuminate\Database\Eloquent\Builder;

class CoordenadorResource extends Resource
{
    protected static ?string $model = Coordenador::class;

    protected static ?string $slug = 'coordenadores';

    protected static ?string $label = 'Coordenador';

    protected static ?string $pluralLabel = 'Coordenadores';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Usuário')
                    ->relationship('user', 'name'),

                Select::make('cargo_id')
                    ->label('Cargo')
                    ->relationship(
                        name:'cargo',
                        titleAttribute: 'nome',
                        modifyQueryUsing: fn(Builder $query) => $query->whereAtivo(true)),

                MorphToSelect::make('coordenadorable')
                    ->label('Local Coordenado')
                    ->types([
                        MorphToSelect\Type::make(Pais::class)
                            ->titleAttribute('nome'),
                        MorphToSelect\Type::make(Estado::class)
                            ->titleAttribute('nome'),
                        MorphToSelect\Type::make(Cidade::class)
                            ->titleAttribute('nome')
                    ]),

                Placeholder::make('created_at')
                    ->label('Data/Hora Cadastro')
                    ->content(fn(?Coordenador $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Data/Hora Última Atualização')
                    ->content(fn(?Coordenador $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Usuário'),
                TextColumn::make('cargo.nome'),

                TextColumn::make('coordenadorable.nome')->label('Local Coordenado'),
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
            'index' => Pages\ListCoordenadors::route('/'),
            'create' => Pages\CreateCoordenador::route('/create'),
            'edit' => Pages\EditCoordenador::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
