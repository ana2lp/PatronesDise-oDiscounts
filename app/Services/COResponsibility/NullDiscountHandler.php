<?php

namespace App\Services\COResponsibility;


use App\Product;
use Illuminate\Http\Request;

class NullDiscountHandler extends AbstractHandler
{

    /**
     * @param Product $product
     * @param Request $request
     * @return null
     */
    public function process(Product $product, Request $request)
    {
        return null;
    }
}