<?php

namespace App\Filament\Widgets;
use Filament\Tables\Grouping\Group;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\HistoryProduct;
class HistoryProductWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table

            ->query(
                HistoryProduct::orderBy('created_at', 'desc')->limit(5)
            )

            ->columns([
                Tables\Columns\TextColumn::make('Product.nama')
                    ->label("Nama Produk")
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
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
                    ->default('heroicon-o-question-mark-circle'), // Fallback icon jika kondisi gagal,
                Tables\Columns\TextColumn::make('jumlah_sesudah')
                    ->label("Jumlah Stok Terbaru")
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_sebelum')
                    ->label("Jumlah Stok Sebelumnya")
                    ->numeric()
                    ->sortable()
                    ->searchable(),
            ])
            ->groups([
                Group::make('created_at')
                    ->date(),
            ]);

    }

}
