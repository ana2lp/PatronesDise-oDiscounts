<?php

namespace App\Services\Builders;


use App\Services\COResponsibility\CategoryDiscountHandler;
use App\Services\COResponsibility\NullDiscountHandler;
use App\Services\COResponsibility\ProductDiscountHandler;
use App\Services\Strategy\SimpleStrategyFactory;

class DiscountBuilder implements BuilderInterface
{

    private $handler;

    /**
     * DiscountBuilder constructor.
     */
    public function __construct()
    {
        $this->handler = new ProductDiscountHandler(new SimpleStrategyFactory());
    }

    public function build()
    {
        $this->handler->setSuccessor(new CategoryDiscountHandler(new SimpleStrategyFactory()));
        $this->handler->setSuccessor(new NullDiscountHandler(new SimpleStrategyFactory()));

        return $this->handler;
    }
}