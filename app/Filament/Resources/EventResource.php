<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Game;
use App\Models\Team;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('uid')
                    ->numeric()
                    ->required(),
                TextInput::make('title')
                    ->maxLength(111)
                    ->helperText('Leave empty to auto-generate from teams'),
                Select::make('home_team_id')
                    ->options(Team::query()->pluck('name', 'id'))
                    ->preload(),
                Select::make('away_team_id')
                    ->options(Team::query()->pluck('name', 'id'))
                    ->preload(),
                TextInput::make('home_goals')
                    ->numeric()
                    ->default(0),
                TextInput::make('away_goals')
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('start_time'),
                Select::make('state')
                    ->options([
                        'Not started' => 'Not started',
                        'Live' => 'Live',
                        'Finished' => 'Finished',
                    ])
                    ->default('Not started'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uid')->sortable(),
                TextColumn::make('title')->searchable(),
                TextColumn::make('homeTeam.name'),
                ImageColumn::make('homeTeam.flag'),
                TextColumn::make('home_goals'),
                TextColumn::make('away_goals'),
                TextColumn::make('awayTeam.name'),
                ImageColumn::make('awayTeam.flag'),
                TextColumn::make('state'),
                TextColumn::make('start_time')->dateTime(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
