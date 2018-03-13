<?php

namespace App\Services\COResponsibility;


use App\Product;
use App\Services\Strategy\SimpleStrategyFactory;
use Illuminate\Http\Request;

abstract class AbstractHandler
{
    /** @var AbstractHandler */
    private $successor = null;
    /**
     * @var SimpleStrategyFactory
     */
    protected $factory;

    /**
     * AbstractHandler constructor.
     * @param SimpleStrategyFactory $factory
     */
    public function __construct(SimpleStrategyFactory $factory)
    {

        $this->factory = $factory;
    }

    public function setSuccessor(AbstractHandler $handler)
    {
        if (null === $this->successor) {
            $this->successor = $handler;
        } else {
            $this->successor->setSuccessor($handler);
        }
    }

    public function handle(Product $product, Request $request)
    {
        $response = $this->process($product, $request);

        if (null === $response) {
            return $this->successor->handle($product, $request);
        }

        return $response;
    }
    
    abstract public function process(Product $product, Request $request);
}