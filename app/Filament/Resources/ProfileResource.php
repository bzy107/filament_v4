<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\ProfileResource\Pages\ListProfiles;
use App\Filament\Resources\ProfileResource\Pages\CreateProfile;
use App\Filament\Resources\ProfileResource\Pages\EditProfile;
use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use App\Models\VariableProfile;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

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
                    $maxInformationDate = VariableProfile::max('information_date');
                    $query->join('variable_profiles', 'profiles.id', '=', 'variable_profiles.profile_id')
                        ->join('ranks', 'variable_profiles.rank_id', '=', 'ranks.id')
                        ->join('affiliation_rooms', 'variable_profiles.affiliation_room_id', '=', 'affiliation_rooms.id')
                        ->where('variable_profiles.information_date', $maxInformationDate);
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
                //             return $query->orderByRaw('CAST(height as DECIMAL(4, 1)) ' . $direction)
                //                 ->orderBy('ranks.status_id', 'asc');
                //         }
                //     ),
                // TextColumn::make('weight')
                //     ->label('体重')
                //     ->sortable(
                //         'weight',
                //         function (Builder $query, string $direction) {
                //             return $query->orderByRaw('CAST(weight as DECIMAL(4, 1)) ' . $direction)
                //                 ->orderBy('ranks.status_id', 'asc');
                //         }
                //     ),
                // TextColumn::make('information_date')
                //     ->label('場所')
                //     ->date('Y/m')
                //     ->searchable(),
            ])
            ->defaultSort(
                fn (Builder $query) => $query->orderBy('ranks.status_id', 'asc')
                    ->orderBy('ranks.id', 'asc')
            )
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
            'index' => ListProfiles::route('/'),
            // 'create' => CreateProfile::route('/create'),
            // 'edit' => EditProfile::route('/{record}/edit'),
        ];
    }
}
