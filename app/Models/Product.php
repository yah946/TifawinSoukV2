<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    
      use HasFactory, SoftDeletes;


    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    
      use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'supplier_id',
        'name',
        'description',
        'stock',
        'price',
        'reference',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);

    }

  
}
