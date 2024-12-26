<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerProfile extends Model
{
    use HasFactory;

    protected $fillable = ["nama", "alamat", "nomor_hp", "keterangan"];

    protected $table = "reseller_profiles";

    public function products()
    {
        return $this->belongsToMany(Product::class, 'reseller_products', 'reseller_profile_id', 'product_id')
            ->withPivot('price', 'stock');
    }

    public function resellerProducts()
    {
        return $this->hasMany(ResellerProduct::class, 'reseller_profile_id');
    }


}