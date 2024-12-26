<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryProductResource\Pages;
use App\Models\HistoryProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Grouping\Group;

class HistoryProductResource extends Resource
{
    protected static ?string $model = HistoryProduct::class;
    protected static ?string $navigationGroup = 'Product';

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static ?string $pluralLabel = 'Riwayat Stok Produk';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label("Nama Produk")
                    ->relationship('Product', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_sesudah')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_sebelum')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Product.Category.kategori')
                    ->label("Kategori")
                    ->searchable()
                    ->sortable(),
                IconColumn::make('status')
                    ->icon(function (HistoryProduct $record): string {
                        if ($record->jumlah_sesudah > $record->jumlah_sebelum) {
                            return "heroicon-o-check-circle";
                        } else if ($record->jumlah_sesudah == 0) {
                            return "heroicon-o-x-circle";
                        } else if ($record->jumlah_sesudah <= 5 || $record->jumlah_sebelum <= 5) {
                            return "heroicon-o-minus-circle";
                        } else if ($record->jumlah_sesudah < $record->jumlah_sebelum) {
                            return "heroicon-o-check-circle";
                        } else {
                            return 'heroicon-o-x-circle';
                        }
                    })
                    ->color(function (HistoryProduct $record): string {
                        if ($record->jumlah_sesudah > $record->jumlah_sebelum) {
                            return "success";
                        } else if ($record->jumlah_sesudah == 0) {
                            return "danger";
                        } else if ($record->jumlah_sesudah <= 5 || $record->jumlah_sebelum <= 5) {
                            return "primary";
                        } else if ($record->jumlah_sesudah < $record->jumlah_sebelum) {
                            return "success";
                        } else {
                            return 'danger';
                        }
                    })
                    ->label('Status')
                    ->default('heroicon-o-question-mark-circle'),
                Tables\Columns\TextColumn::make('Product.nama')
                    ->label("Nama Produk")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_sesudah')
                    ->label("Stok Terbaru")
                    ->alignCenter()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_sebelum')
                    ->label("Stok Sebelumnya")
                    ->alignCenter()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Tanggal Perubahan")
                    ->dateTime()
                    ->sortable(),
            ])
            // ->actions([
            //     Tables\Actions\Action::make('Lihat Laporan')
            //         ->label("Lihat Laporan")
            //         ->color('success')
            //         ->url(fn(HistoryProduct $record): string => self::getUrl('laporan', [
            //             'record' => $record,
            //             'kategori' => $record->Product->Category->kategori, // Ambil nama kategori
            //         ])),
            //     // other actions...
            // ])

            ->bulkActions([])
            ->defaultSort('created_at', 'desc')
            ->groups([
                Group::make('created_at')
                    ->date(),
            ]);
        ;

    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHistoryProducts::route('/'),
            'laporan' => Pages\LaporanPerKategori::route('/laporan')
        ];
    }

    // Disable create button
    public static function canCreate(): bool
    {
        return false;
    }
}