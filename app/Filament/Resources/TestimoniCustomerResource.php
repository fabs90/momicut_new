<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniCustomerResource\Pages;
use App\Filament\Resources\TestimoniCustomerResource\RelationManagers;
use App\Models\TestimoniCustomer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimoniCustomerResource extends Resource
{
    protected static ?string $model = TestimoniCustomer::class;
    protected static ?string $navigationGroup = 'Pelanggan';
    public static ?string $pluralLabel = 'Testimoni Pelanggan';

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(fn($file) => $file->hashName())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label("Gambar Testimoni"),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTestimoniCustomers::route('/'),
        ];
    }
}