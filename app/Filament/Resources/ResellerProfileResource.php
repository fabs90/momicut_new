<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResellerProfileResource\Pages;
use App\Filament\Resources\ResellerProfileResource\RelationManagers;
use App\Models\ResellerProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResellerProfileResource extends Resource
{
    protected static ?string $model = ResellerProfile::class;
    protected static ?string $navigationGroup = 'Reseller';
    public static ?string $pluralLabel = 'Data Reseller';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_hp')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->limit(25)
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->limit(30)
                    ->searchable(),
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListResellerProfiles::route('/'),
            'create' => Pages\CreateResellerProfile::route('/create'),
            'edit' => Pages\EditResellerProfile::route('/{record}/edit'),
        ];
    }
}