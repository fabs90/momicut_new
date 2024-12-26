<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationGroup = 'Product';
    public static ?string $pluralLabel = 'Produk';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label("Kategori")
                    ->relationship('Category', 'kategori')
                    ->required(),
                Forms\Components\TextInput::make("nama")
                    ->label("Nama Produk")
                    ->required()
                    ->maxLength(50)
                    ->reactive()
                    ->debounce(350)
                    ->autoComplete(false)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $formattedKategori = ucwords($state);
                        $set('nama', $formattedKategori);
                        $set('slug', Str::slug($formattedKategori));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->label("Nama Produk (Otomatis terisi)")
                    ->hidden()
                    ->maxLength(255),
                Forms\Components\TextInput::make("harga")
                    ->numeric()
                    ->required()
                    ->autocomplete(false),
                Forms\Components\Textarea::make("deskripsi")
                    ->label("Deskripsi")
                    ->required(),
                Forms\Components\TextInput::make("stok")
                    ->label("Stok (opsional)")
                    ->numeric()
                    ->minValue(0)
                    ->autocomplete(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Category.kategori')
                    ->sortable()
                    ->label("Kategori")
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->money("IDR")
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('stok')
                    ->extraAttributes(['style' => 'width: 200px;'])
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
                    Tables\Actions\DeleteBulkAction::make()->label("Delete"),
                ])->label("Delete"),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}