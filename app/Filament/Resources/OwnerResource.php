<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OwnerResource\Pages\CreateOwner;
use App\Filament\Resources\OwnerResource\Pages\EditOwner;
use App\Filament\Resources\OwnerResource\Pages\ListOwners;
use App\Models\Owner;
use App\Models\Patient;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $maxDate = Patient::max('registered_at');
                $query->join('patients', 'owners.id', '=', 'patients.owner_id')
                    ->join('breeds', 'patients.breed_id', '=', 'breeds.id')
                    ->join('vaccines', 'patients.vaccine_id', '=', 'vaccines.id')
                    // ->select([
                    //         'owners.id',
                    //         'owners.email',
                    //         'owners.phone',
                    //         'owners.owner_name',
                    //         'patients.patient_name',
                    //         'patients.type',
                    //         'patients.registered_at',
                    //         'breeds.breed_name',
                    //         'vaccines.vaccine_name',
                    // ])
                    ->where('patients.registered_at', $maxDate);
            })
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('email')
                    ->label('owner email'),
                TextColumn::make('phone')
                    ->label('owner phone'),
                TextColumn::make('owner_name'),
                TextColumn::make('patient_name'),
                TextColumn::make('type')
                    ->label('patient type'),
                TextColumn::make('registered_at')
                    ->label('patient registered_at')
                    ->formatStateUsing(
                        function ($record) {
                            $date = Carbon::parse($record->registered_at);
                            $date = $date->format('Y/m/d');

                            return $date;
                        }
                    ),
                TextColumn::make('breed_name'),
                TextColumn::make('vaccine_name'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListOwners::route('/'),
            // 'create' => CreateOwner::route('/create'),
            // 'edit' => EditOwner::route('/{record}/edit'),
        ];
    }
}
