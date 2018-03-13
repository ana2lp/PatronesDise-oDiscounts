<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function discounts()
    {
        return $this->hasMany(CategoryDiscount::class);
    }

    public function hasDiscounts()
    {
        return $this->discounts->isNotEmpty();
    }
}
