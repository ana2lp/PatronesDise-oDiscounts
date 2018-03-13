<?php

namespace App\Services\Strategy;


interface StrategyInterface
{
    /**
     * @return mixed
     */
    public function process();

    /**
     * @param $subtotal
     * @return mixed
     */
    public function getTotal($subtotal);

    /**
     * @return mixed
     */
    public function subTotal();
}