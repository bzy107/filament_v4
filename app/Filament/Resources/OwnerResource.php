<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OwnerResource\Pages;
use App\Filament\Resources\OwnerResource\RelationManagers;
use App\Models\Owner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->join('patients', 'owners.id', '=', 'patients.owner_id')
                    ->join('treatments', 'patients.id', '=', 'treatments.patient_id')
                    ->select(['*', 'owners.name as owner_name', 'patients.name as patient_name']);
            })
            ->columns([
                TextColumn::make('email')
                    ->label('owner email'),
                TextColumn::make('owner_name')
                    ->label('owner name'),
                TextColumn::make('phone')
                    ->label('owner phone'),
                TextColumn::make('date_of_birth')
                    ->label('patients date_of_birth'),
                TextColumn::make('patient_name')
                    ->label('patients name'),
                TextColumn::make('description')
                    ->label('treatments description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOwners::route('/'),
            'create' => Pages\CreateOwner::route('/create'),
            'edit' => Pages\EditOwner::route('/{record}/edit'),
        ];
    }
}
