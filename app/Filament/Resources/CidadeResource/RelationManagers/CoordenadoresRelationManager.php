<?php

namespace App\Filament\Resources\CidadeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CoordenadoresRelationManager extends RelationManager
{
    protected static string $relationship = 'coordenadores';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')->label('Usuário')
                    ->searchable()
                    ->preload()
                    ->optionsLimit(5)
                    ->relationship('user', 'name'),
                Forms\Components\Select::make('cargo_id')
                ->relationship('cargo', 'nome'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nome')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário'),
                Tables\Columns\TextColumn::make('cargo.nome'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('cargo')
                    ->relationship('cargo', 'nome')
                    ->preload()
                    ->searchable()
                    ->multiple(),
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
