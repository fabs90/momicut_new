<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageProduct extends Model
{
    use HasFactory;

    protected $table = "image_products";

    protected $fillable = [
        'product_id',
        'is_primary',
        'image'
    ];

    protected static function booted()
    {
        static::updating(function ($imageProduct) {
            // Cek apakah ada gambar lama yang harus dihapus
            $originalImage = $imageProduct->getOriginal('image');

            if ($originalImage && $originalImage !== $imageProduct->image) {
                // Hapus gambar lama
                if (Storage::exists('public/' . $originalImage)) {
                    Storage::delete('public/' . $originalImage);
                }
            }

            // Jika is_primary diset ke true, ubah foto lain menjadi false
            if ($imageProduct->is_primary) {
                ImageProduct::where('product_id', $imageProduct->product_id)
                    ->where('id', '!=', $imageProduct->id)
                    ->update(['is_primary' => false]);
            }
        });
    }


    public function delete()
    {
        // Hapus file gambar jika ada
        if ($this->image && Storage::exists('public/' . $this->image)) {
            Storage::delete('public/' . $this->image);
        }

        // Hapus data dari database
        return parent::delete();
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}