<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Menghitung jumlah total produk
        $allProduk = Product::all()->count();

        // Mengambil semua kategori
        $categories = Category::all();

        // Menyimpan array Stat untuk setiap kategori
        $stats = [];

        // Perulangan untuk setiap kategori
        foreach ($categories as $category) {
            // Hitung jumlah produk berdasarkan kategori
            $productCount = Product::where('category_id', $category->id)->count();

            // Menambahkan stat ke dalam array
            $stats[] = Stat::make("Jumlah Produk di {$category->kategori}", $productCount);
        }

        // Menambahkan stat jumlah total produk ke dalam array
        $stats[] = Stat::make('Jumlah Total Produk', $allProduk)->color('success');

        // Mengembalikan array stat yang sudah digabungkan
        return $stats;
    }
}
