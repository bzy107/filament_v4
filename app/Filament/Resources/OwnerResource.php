<?php

namespace App\Filament\Resources;

use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\OwnerResource\Pages;
use App\Filament\Resources\OwnerResource\Pages\CreateOwner;
use App\Filament\Resources\OwnerResource\Pages\EditOwner;
use App\Filament\Resources\OwnerResource\Pages\ListOwners;
use App\Filament\Resources\OwnerResource\RelationManagers;
use App\Models\Owner;
use App\Models\Patient;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

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
                // TextColumn::make('species')
                //     ->label('breed species')
                //     ->sortable()
                //     ->formatStateUsing(
                //         function ($record) {
                //             $breeds = '';
                //             if (preg_match('/Dog/', $record->species)) {
                //                 $breeds = 'Dog ';
                //             }
                //             if (preg_match('/Rabbit/', $record->species)) {
                //                 $breeds = 'Rabbit ';
                //             }
                //             if (preg_match('/Cat/', $record->species)) {
                //                 $breeds = 'Cat ';
                //             }
                //             if (preg_match('/Bird/', $record->species)) {
                //                 $breeds = 'Bird ';
                //             }
                //             return $breeds . $record->breed_id;
                //         }
                //     ),
                // TextColumn::make('note')
                //     ->label('breed note'),
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
