<?php

namespace App\Listeners;

use App\Models\Sales;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\StockUpdated;

class UpdateSalesOnStockChange
{
    /**
     * Handle the event.
     */
    public function handle(StockUpdated $event): void
    {
        $stokTerjual = $event->jumlahSebelum - $event->jumlahSesudah;

        if ($stokTerjual < 0) {
            return;
        }

        // Cari record sales pada hari yang sama untuk produk ini
        $today = now()->format('Y-m-d');
        $existingSale = Sales::where('product_id', $event->product->id)
            ->whereDate('created_at', $today)
            ->first();

        // Hitung total stok terjual
        $totalStokTerjual = $stokTerjual;

        if ($existingSale) {
            // Jika ada record sebelumnya, tambahkan stok terjual sebelumnya ke stok terjual saat ini
            // $totalStokTerjual += $existingSale->stok_terjual;
            Sales::create([
                'product_id' => $event->product->id,
                'stok_terjual' => $totalStokTerjual, // stok terjual kumulatif
                'pendapatan' => $totalStokTerjual * $event->product->harga,
            ]);
            // Update record yang sudah ada
            // $existingSale->update([
            //     'stok_terjual' => $totalStokTerjual, // stok terjual kumulatif
            //     'pendapatan' => $totalStokTerjual * $event->product->harga, // Update pendapatan
            // ]);
        } else {
            // Simpan record baru jika tidak ada record hari ini
            Sales::create([
                'product_id' => $event->product->id,
                'stok_terjual' => $totalStokTerjual, // stok terjual kumulatif
                'pendapatan' => $totalStokTerjual * $event->product->harga,
            ]);
        }
    }
}