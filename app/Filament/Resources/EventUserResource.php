<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventUserResource\Pages;
use App\Filament\Resources\EventUserResource\RelationManagers;
use App\Models\Event;
use App\Models\EventUser;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventUserResource extends Resource
{
    protected static ?string $model = EventUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Select::make('event_id')
                    ->multiple()
                    ->options(Event::all()->pluck('id', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('home_prediction')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('away_prediction')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('is_available')
                    ->required(),
                Forms\Components\DateTimePicker::make('prediction_time')
                    ->required(),
                Forms\Components\Toggle::make('is_boosted')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('home_prediction')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('away_prediction')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean(),
                Tables\Columns\TextColumn::make('prediction_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_boosted')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListEventUsers::route('/'),
            'create' => Pages\CreateEventUser::route('/create'),
            'edit' => Pages\EditEventUser::route('/{record}/edit'),
        ];
    }
}
