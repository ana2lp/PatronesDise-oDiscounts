<?php

namespace App\Services\Strategy;


use App\Product;
use Illuminate\Http\Request;

class StrategyCurrency implements StrategyInterface
{

    /**
     * @var Product
     */
    private $product;
    /**
     * @var Request
     */
    private $request;

    public function __construct(Product $product, Request $request)
    {
        $this->product = $product;
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function process()
    {
        return $this->getTotal(
            $this->subTotal()
        );
    }

    /**
     * @return float|int
     */
    public function subTotal()
    {
        return $this->product->prices->first()->base * $this->request->quantity;
    }

    /**
     * @param $subtotal
     * @return mixed
     */
    public function getTotal($subtotal)
    {
        return $subtotal - $this->product->discounts->first()->value;
    }
}