<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OwnerResource\Pages;
use App\Filament\Resources\OwnerResource\Pages\CreateOwner;
use App\Filament\Resources\OwnerResource\Pages\EditOwner;
use App\Filament\Resources\OwnerResource\Pages\ListOwners;
use App\Filament\Resources\OwnerResource\RelationManagers;
use App\Models\Owner;
use App\Models\Patient;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
            ->modifyQueryUsing(
                function (Builder $query) {
                    $maxInformationDate = Patient::max('information_date');
                    $query->join('patients', 'owners.id', '=', 'patients.owner_id')
                        ->join('breeds', 'patients.breed_id', '=', 'breeds.id')
                        ->join('vaccines', 'patients.vaccine_id', '=', 'vaccines.id')
                        ->where('patients.information_date', $maxInformationDate);
                }
            )
            ->columns([
                // TextColumn::make('rank_name')
                //     ->label('番付')
                //     ->sortable()
                //     ->searchable()
                //     ->formatStateUsing(
                //         function ($record) {
                //             $direction = $record->direction === 'east' ? '東方' : '西方';

                //             return "{$direction} {$record->rank_name}";
                //         }
                //     ),
                TextColumn::make('last_name')
                    ->label('四股名')
                    ->searchable()
                    ->formatStateUsing(
                        function ($record): HtmlString|string {
                            $playerName = "{$record->last_name} {$record->first_name}";
                            if ($record->is_retired === 0) {
                                return $playerName;
                            }

                            $badgeHtml = Blade::render(
                                '<x-filament::badge color="danger" style="margin-left: 10px; margin-right:10px;">引退</x-filament::badge>'
                            );

                            return new HtmlString(
                                '<span class="flex items-center gap-x-1">'
                                . $playerName
                                . $badgeHtml
                                . '</span>'
                            );
                        }
                    ),
                TextColumn::make('last_name_kana')
                    ->label('かな')
                    ->searchable()
                    ->formatStateUsing(
                        function ($record): string {
                            return "{$record->last_name_kana} {$record->first_name_kana}";
                        }
                    ),
                TextColumn::make('real_name')
                    ->label('本名')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('room_name')
                    ->label('部屋')
                    ->searchable(),
                // TextColumn::make('birthday')
                //     ->label('生年月日')
                //     ->sortable()
                //     ->formatStateUsing(
                //         function ($record) {
                //             $date = Carbon::parse($record->birthday);
                //             $birth = $date->format('Y/m/d');

                //             return "{$birth} ({$date->age})";
                //         }
                //     ),
                // TextColumn::make('country')
                //     ->label('出身地')
                //     ->searchable()
                //     ->formatStateUsing(
                //         function ($record) {
                //             if ($record->country === '日本') {
                //                 return $record->place_of_birth;
                //             }

                //             return "{$record->country} {$record->place_of_birth}";
                //         }
                //     ),
                // TextColumn::make('height')
                //     ->label('身長')
                //     ->sortable(
                //         'height',
                //         function (Builder $query, string $direction) {
                //             return $query->orderByRaw('CAST(height as DECIMAL(4, 1)) ' . $direction);
                //                 // ->orderBy('ranks.status_id', 'asc');
                //         }
                //     ),
                // TextColumn::make('weight')
                //     ->label('体重')
                //     ->sortable(
                //         'weight',
                //         function (Builder $query, string $direction) {
                //             return $query->orderByRaw('CAST(weight as DECIMAL(4, 1)) ' . $direction);
                //                 // ->orderBy('ranks.status_id', 'asc');
                //         }
                //     ),
                // TextColumn::make('information_date')
                //     ->label('場所')
                //     ->date('Y/m')
                //     ->searchable(),
            ])
            // ->defaultSort(
            //     fn (Builder $query) => $query->orderBy('ranks.status_id', 'asc')
            //         ->orderBy('ranks.id', 'asc')
            // )
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

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->modifyQueryUsing(function (Builder $query) {
    //             $maxDate = Patient::max('registered_at');
    //             $query->join('patients', 'owners.id', '=', 'patients.owner_id')
    //                 ->join('breeds', 'patients.breed_id', '=', 'breeds.id')
    //                 ->join('vaccines', 'patients.vaccine_id', '=', 'vaccines.id')
    //                 ->where('patients.registered_at', $maxDate);
    //         })
    //         ->columns([
    //             TextColumn::make('species')
    //                 ->sortable()
    //                 ->formatStateUsing(
    //                     function ($record) {
    //                         $breeds = '';
    //                         if (preg_match('/Dog/', $record->species)) {
    //                             $breeds = 'Dog ';
    //                         }
    //                         if (preg_match('/Rabbit/', $record->species)) {
    //                             $breeds = 'Rabbit ';
    //                         }
    //                         if (preg_match('/Cat/', $record->species)) {
    //                             $breeds = 'Cat ';
    //                         }
    //                         if (preg_match('/Bird/', $record->species)) {
    //                             $breeds = 'Bird ';
    //                         }
    //                         return $breeds . $record->breed_id;
    //                     }
    //                 ),
    //             TextColumn::make('type'),
    //             TextColumn::make('email')
    //                 ->label('owner email phone')
    //                 ->formatStateUsing(
    //                     function ($record) {
    //                         return "{$record->email} {$record->phone}";
    //                     }
    //                 ),
    //             TextColumn::make('owner_name')
    //                 ->label('owner name'),
    //             TextColumn::make('patient_name')
    //                 ->label('patients name'),
    //             TextColumn::make('vaccine_name')
    //                 ->label('vaccines name'),
    //             TextColumn::make('breed_name')
    //                 ->label('breeds name'),
    //             TextColumn::make('registered_at')
    //                 ->label('registered_at')
    //                 ->formatStateUsing(
    //                     function ($record) {
    //                         $date = Carbon::parse($record->registered_at);
    //                         $date = $date->format('Y/m/d');

    //                         return $date;
    //                     }
    //                 ),
    //         ])
    //         ->filters([
    //             //
    //         ])
    //         ->recordActions([
    //             EditAction::make(),
    //         ])
    //         ->toolbarActions([
    //             BulkActionGroup::make([
    //                 DeleteBulkAction::make(),
    //             ]),
    //         ]);
    // }

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
            'create' => CreateOwner::route('/create'),
            'edit' => EditOwner::route('/{record}/edit'),
        ];
    }
}
