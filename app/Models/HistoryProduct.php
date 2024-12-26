<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryProduct extends Model
{
    use HasFactory;

    protected $table = "history_products";

    protected $fillable = [
        'product_id',
        'jumlah_sesudah',
        'jumlah_sebelum'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

}
