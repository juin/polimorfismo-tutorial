<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Estado;
use App\Models\Pais;
use Filament\Forms;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Cidade;
use Illuminate\Support\Facades\Log;

class CoordenadorsRelationManager extends RelationManager
{
    protected static string $relationship = 'coordenadores';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                MorphToSelect::make('coordenadorable')
                    ->label('Local Coordenado')
                    ->types([
                        MorphToSelect\Type::make(Pais::class)
                            ->titleAttribute('nome'),
                        MorphToSelect\Type::make(Estado::class)
                            ->titleAttribute('nome'),
                        MorphToSelect\Type::make(Cidade::class)
                            ->titleAttribute('nome'),
                ]),
                Forms\Components\Select::make('cargo_id')
                    ->relationship('cargo', 'nome'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('cargo.nome')
            ->columns([
                Tables\Columns\TextColumn::make('cargo.nome'),
                Tables\Columns\TextColumn::make('coordenadorable.nome')
                    ->label('Local Coordenador'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('cargo')
                    ->relationship('cargo', 'nome')
                    ->multiple(),
                //Filtro usando o relacionamento polimorfico do modelo Coordenador.
                Tables\Filters\Filter::make('local_coordenado')
                    ->form([
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
                    ])->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['coordenadorable_type'],
                                fn (Builder $query, $tipo): Builder => $query->where('coordenadorable_type', '=', $tipo)
                            )
                            ->when(
                                $data['coordenadorable_id'],
                                fn (Builder $query, $id): Builder => $query->where('coordenadorable_id', '=', $id)
                            );
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
