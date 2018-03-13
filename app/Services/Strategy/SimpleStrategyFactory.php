<?php

namespace App\Services\Strategy;


use App\Product;
use Illuminate\Http\Request;

class SimpleStrategyFactory
{
    private $strategyes = [
        'PERCENTAGE' => StrategyPercentage::class,
        'CURRENCY' => StrategyCurrency::class,
    ];

    public function make($type, Product $product, Request $request)
    {
        if (array_key_exists($type, $this->strategyes)) {
            return new $this->strategyes[$type]($product, $request);
        }

        throw new \Exception('Not supported strategy');
    }
}