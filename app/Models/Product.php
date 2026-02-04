<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function cover(){
        return $this->hasOne(Image::class)->where('cover',true);
    }
}
