<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
class CategoryResource extends Resource
{
    public static ?string $pluralLabel = 'Kategori';
    protected static ?string $model = Category::class;
    protected static ?string $navigationGroup = 'Product';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->maxLength(255)
                    ->reactive() // Menggunakan reactive agar slug berubah secara real-time
                    ->debounce(300) // Menambahkan debounce untuk mencegah pengupdatean terlalu cepat
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Mengubah kategori menjadi huruf kapital di awal setiap kata
                        $formattedKategori = ucwords($state);
                        $set('kategori', $formattedKategori);
                        $set('slug', Str::slug($formattedKategori));
                    })
                ,
                Forms\Components\TextInput::make('slug')
                    ->label("Slug (Otomatis terisi)")
                    ->readOnly()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
