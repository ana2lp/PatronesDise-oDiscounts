<?php

namespace App\Services\Builders;


class Director
{
    public function build(BuilderInterface $builder)
    {
        return $builder->build();
    }
}