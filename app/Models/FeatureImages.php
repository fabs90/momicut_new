<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureImages extends Model
{
    use HasFactory;

    protected $table = "feature_images";

    protected $fillable = [
        'url',
        'description'
    ];
}