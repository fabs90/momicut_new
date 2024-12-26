<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageProductResource\Pages;
use App\Filament\Resources\ImageProductResource\RelationManagers;
use App\Models\ImageProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageProductResource extends Resource
{
    protected static ?string $model = ImageProduct::class;
    protected static ?string $navigationGroup = 'Product';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static ?string $pluralLabel = 'Gambar Produk';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label("Nama Produk")
                    ->relationship('Product', 'nama')
                    ->required(),
                Forms\Components\Toggle::make('is_primary')
                    ->label("Gambar Utama")
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(fn($file) => $file->hashName())
                    ->label("Gambar Produk")
                    ->required()
                ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Product.nama')
                    ->label("Nama Produk")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_primary')
                    ->label("Gambar Utama")
                    ->boolean(),
                Tables\Columns\ImageColumn::make('image')
                    ->label("Gambar Produk"),
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
            'index' => Pages\ListImageProducts::route('/'),
            'create' => Pages\CreateImageProduct::route('/create'),
            'edit' => Pages\EditImageProduct::route('/{record}/edit'),
        ];
    }
}