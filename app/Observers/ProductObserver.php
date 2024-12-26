<?php

namespace App\Observers;

use App\Models\HistoryProduct;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "Creating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        if (is_null($product->stok)) {
            $product->stok = 0;
        }
    }

    /**
     * Handle the Product "updating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        // Periksa jika stok diubah
        if ($product->isDirty('stok')) {
            // Buat entri history stok sebelum diubah
            HistoryProduct::create([
                'product_id' => $product->id,
                'jumlah_sebelum' => $product->getOriginal('stok'), // stok sebelum perubahan
                'jumlah_sesudah' => $product->stok // stok setelah perubahan
            ]);

            // Trigger event StockUpdated
            event(new \App\Events\StockUpdated($product, $product->getOriginal('stok'), $product->stok));
        }
    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}