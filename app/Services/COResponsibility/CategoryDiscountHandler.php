<?php

namespace App\Services\COResponsibility;


use App\Product;
use Illuminate\Http\Request;

class CategoryDiscountHandler extends AbstractHandler
{

    /**
     * @param Product $product
     * @param Request $request
     * @return null|string
     */
    public function process(Product $product, Request $request)
    {
        $total = null;

        if ($product->category->hasDiscounts()) {
            try {
                $strategy = $this->factory->make(
                    $product->discounts->first()->unit,
                    $product,
                    $request
                );

                $total = $strategy->process();

            } catch ( \Exception $e) {
                return $e->getMessage();
            }
        }

        return $total;
    }
}