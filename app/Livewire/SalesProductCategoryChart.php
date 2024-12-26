<?php

namespace App\Livewire;

use App\Models\Sales;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class SalesProductCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    public $product; // Mendeklarasikan variabel produk

    // Gunakan mount untuk inisialisasi produk
    public function setProduct($product)
    {
        $this->product = $product;
    }

    protected function getData(): array
    {
        $data = Trend::model(Sales::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        $labels = Sales::where('product_id', '=', $this->product->id)->latest();

        return [
            'datasets' => [
                [
                    'label' => $labels->product->nama,
                    'data' => $data->map(fn(Sales $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(Sales $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
