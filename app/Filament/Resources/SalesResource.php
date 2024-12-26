<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesResource\Pages;
use App\Filament\Resources\SalesResource\Pages\DetailProductSales;
use App\Filament\Widgets\DetailProductSalesStats;
use App\Models\Sales;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Grouping\Group;

class SalesResource extends Resource
{
    protected static ?string $model = Sales::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Product';
    public static ?string $pluralLabel = 'Laporan Penjualan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')->label('Produk')->options(Product::all()->pluck('nama', 'id')),
                Forms\Components\TextInput::make('stok_terjual')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('pendapatan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.category.kategori')
                    ->label("Kategori")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product.nama')
                    ->label("Produk")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('stok_terjual')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pendapatan')
                    ->money("IDR")
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Tanggal Terjual")
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
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
                    Tables\Actions\DeleteBulkAction::make()->label("Delete"),
                ])->label("Delete"),
            ])
            ->defaultSort('created_at', 'desc')
            ->groups([
                Group::make('created_at')
                    ->label("Tanggal Dibuat")
                    ->date(),
            ]);
        ;
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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSales::route('/create'),
            'edit' => Pages\EditSales::route('/{record}/edit'),
            'laporan' => Pages\SalesPerKategori::route('/laporan'),
            'productSalesPerCategory' => Pages\ProductSalesPerCategory::route('/laporan/kategori/{category}'),
            'detailProductSales' => DetailProductSales::route('/laporan/kategori/detail/{product}'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            \App\Livewire\DetailProductSalesStats::class,  // Mendaftarkan widget
            \App\Livewire\SalesProductCategoryStats::class,
            \App\Livewire\SalesProductCategoryChart::class,
            \App\Livewire\DetailProductSalesChart::class,
        ];
    }



}