<?php

namespace App\Filament\Resources\HistoryProductResource\Pages;

use App\Filament\Resources\HistoryProductResource;
use Filament\Resources\Pages\Page;

class LaporanPerKategori extends Page
{
    protected static string $resource = HistoryProductResource::class;

    protected static string $view = 'filament.resources.history-product-resource.pages.laporan-per-kategori';
}
