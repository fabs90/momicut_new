<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResellerProductsResource\Pages;
use App\Filament\Resources\ResellerProductsResource\RelationManagers;
use App\Models\ResellerProduct;
use App\Models\ResellerProducts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResellerProductsResource extends Resource
{

    protected static ?string $model = ResellerProduct::class;
    protected static ?string $navigationGroup = 'Reseller';
    public static ?string $pluralLabel = 'Data Produk Reseller';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('reseller_profile_id')
                    ->label('Nama Reseller')
                    ->relationship('resellerProfile', 'nama') // Menggunakan relasi resellerProfile
                    ->required(),

                Forms\Components\Select::make('product_id')
                    ->label('Nama Produk')
                    ->relationship('product', 'nama') // Menggunakan relasi product
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->required(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('resellerProfile.nama')
                    ->label('Nama Reseller')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.nama')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money("IDR")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Stok')
                    ->searchable()
                    ->sortable()

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
            'index' => Pages\ListResellerProducts::route('/'),
            'create' => Pages\CreateResellerProducts::route('/create'),
            'edit' => Pages\EditResellerProducts::route('/{record}/edit'),
        ];
    }
}