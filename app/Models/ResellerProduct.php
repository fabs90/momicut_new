<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerProduct extends Model
{
    use HasFactory;

    protected $table = "reseller_products";
    protected $fillable = ["reseller_profile_id", "product_id", "price", "stock"];



    public function resellerProfile()
    {
        return $this->belongsTo(ResellerProfile::class, 'reseller_profile_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


}