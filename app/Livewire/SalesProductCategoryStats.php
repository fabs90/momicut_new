<?php

namespace App\Livewire;

use App\Models\Sales;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;

class SalesProductCategoryStats extends BaseWidget
{
    public $category;

    public function mount($category)
    {
        $this->category = $category;
        $hasProduct = Product::where('category_id', '=', $this->category->id)->exists();
        if (!$category || !$hasProduct) {
            session()->flash('error', 'Belum ada produk untuk kategori ini.');
            return redirect()->route('filament.admin.resources.sales.laporan');
        }
    }

    protected function getStats(): array
    {
        $totalRevenue = Product::where('category_id', $this->category->id)
            ->join('sales', 'products.id', '=', 'sales.product_id')
            ->groupBy('products.id')
            ->selectRaw('SUM(sales.pendapatan) as top_revenue')
            ->get()
            ->sum('top_revenue');

        $bestSelling = Product::where('category_id', $this->category->id)
            ->join('sales', 'products.id', '=', 'sales.product_id')
            ->select('products.nama')
            ->groupBy('products.id', 'products.nama')
            ->orderByRaw('SUM(sales.stok_terjual) DESC')
            ->first();

        $bestSellingName = $bestSelling ? $bestSelling->nama : 'Tidak ada data produk terlaris';
        // $chartData = Product::where('category_id', $this->category->id)
        //     ->join('sales', 'products.id', '=', 'sales.product_id')
        //     ->selectRaw('DATE(sales.created_at) as sale_date, SUM(sales.stok_terjual) as total_sold')
        //     ->groupBy('sale_date')
        //     ->orderBy('sale_date')
        //     ->get();


        return [
            Stat::make('Total Pendapatan: ', 'Rp.' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Kategori: ' . $this->category->kategori)
                ->color('primary'),
            Stat::make('Produk Terlaris', $bestSellingName)
                ->description('Tanggal: ' . now()->format('d F Y'))
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success')

        ];
    }
}