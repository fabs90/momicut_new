<x-filament-panels::page>
    @livewire('detail-product-sales-stats', ['product' => $product])
    {{-- <p>Total Penjualan: Rp.{{ number_format($totalRevenue, 0, ',', '.') }}</p> --}}
    {{ $this->table }}
    @livewire('detail-product-sales-chart', ['product' => $product])
    {{-- <p>{{ $product }}</p> --}}
</x-filament-panels::page>
