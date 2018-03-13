<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\Builders\Director;
use App\Services\Builders\DiscountBuilder;
use Carbon\Carbon;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function purchase(Request $request)
    {
        $product = $this->resolveProductFromRequest($request);

        $discount = (new Director())->build(new DiscountBuilder());

        dd($discount->handle($product, $request));

    }

    //Obtiene productos con sus descuentos si es que tiene
    public function resolveProductFromRequest(Request $request)
    {
        return $product = Product::with([
            'prices' => function($query){
                $query->whereIsActive(true);
            },
            'category.discounts' => function($query) use ($request){
                $query->whereCouponCode($request->coupon)
                    ->whereDate('valid_from','<=',Carbon::now()->format('Y-m-d'))
                    ->whereDate('valid_until', '>=', Carbon::now()->format('Y-m-d'))
                ;
            },
            'discounts' => function($query) use($request){
                $query->whereCouponCode($request->coupon)
                    ->whereDate('valid_from','<=',Carbon::now()->format('Y-m-d'))
                    ->whereDate('valid_until', '>=', Carbon::now()->format('Y-m-d'))
                ;
            }
        ])->findOrFail($request->id);
    }
}
