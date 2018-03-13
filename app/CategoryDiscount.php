<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryDiscount extends Model
{
    protected $fillable = [
        'value',
        'unit',
        'valid_from',
        'valid_until',
        'coupon_code',
        'minimum_order_value',
        'maximum_discount_amount',
    ];
}
