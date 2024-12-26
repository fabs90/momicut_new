<?php
namespace App\Livewire;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Sales;

class DetailProductSalesStats extends BaseWidget
{
    public $product;


    // Gunakan mount untuk menginisialisasi data produk, startDate, dan endDate
    public function mount($product)
    {
        $this->product = $product;
    }

    protected function getStats(): array
    {
        return $this->calculateStats();
    }

    protected function calculateStats(): array
    {
        $salesQuery = Sales::where('product_id', $this->product->id);

        // Calculate statistics
        $totalRevenue = $salesQuery->sum('pendapatan');
        $totalUnitsSold = $salesQuery->sum('stok_terjual');
        $averageRevenue = $salesQuery->avg('pendapatan');

        return [
            $this->createStat('Total Revenue', $totalRevenue, 'Total pendapatan dari produk', 'IDR'),
            $this->createStat('Total Units Sold', $totalUnitsSold, 'Total unit terjual'),
            $this->createStat('Average Revenue', $averageRevenue, 'Rata-rata pendapatan', 'IDR')
        ];
    }

    private function createStat(string $label, float $value, string $description, string $suffix = ''): Stat
    {
        return Stat::make($label, number_format($value, 0, ',', '.') . ' ' . $suffix)
            ->description($description);
    }


}