<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'in_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function discounts()
    {
        return $this->hasMany(ProductDiscount::class);
    }

    public function hasDiscounts()
    {
        return $this->discounts->isNotEmpty();
    }
}
