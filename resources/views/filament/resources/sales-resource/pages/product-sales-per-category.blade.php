<x-filament-panels::page>
    @livewire('sales-product-category-stats', ['category' => $category])
    {{ $this->table }}

    <a href="/admin/sales/laporan">Kembali ke Kategori</a>
</x-filament-panels::page>
