<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroImages extends Model
{
    use HasFactory;

    protected $table = "hero_images";

    protected $fillable = [
        'url',
        'description'
    ];

}