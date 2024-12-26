<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'nama',
        'deskripsi',
        'stok',
        'harga',
        'slug'
    ];

    protected $attributes = [
        'stok' => 0,
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            if (empty($model->slug) && $model->nama) {
                $model->slug = Str::slug($model->nama);
            }
        });
    }


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ImageProduct::class, 'product_id')->where('is_primary', true);
    }

    public function Sales()
    {
        return $this->hasMany(Sales::class);
    }

    public function Images()
    {
        return $this->hasMany(ImageProduct::class, 'product_id');
    }

    public function resellers()
    {
        return $this->belongsToMany(ResellerProfile::class, 'reseller_products', 'product_id', 'reseller_profile_id')
            ->withPivot('price', 'stock');
    }


}