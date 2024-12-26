<?php

namespace App\Livewire;

use App\Models\Sales;
use Filament\Widgets\ChartWidget;

class DetailProductSalesChart extends ChartWidget
{
    public $product;
    protected static ?string $heading = 'Produk ';

    // Metode untuk mengatur produk
    public function setProduct($product): void
    {
        $this->product = $product;
    }

    protected function getData(): array
    {
        $data = Sales::where('product_id', $this->product->id)->get();

        return [
            'datasets' => [
                [
                    'label' => 'Produk Terjual',
                    'data' => $data->pluck('stok_terjual')->map(fn($value) => round($value))->all(),
                ],
            ],
            'labels' => $data->map(fn($item) => $item->created_at->format('d M Y'))->all(),
        ];
    }



    protected function getType(): string
    {
        return 'line';
    }
}