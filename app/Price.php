<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'base',
        'expire_at',
        'is_active',
    ];
}
