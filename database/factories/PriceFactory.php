<?php

use Faker\Generator as Faker;

$factory->define(App\Price::class, function (Faker $faker) {
    return [
        'base' => 30.00,
        'expire_at' => $faker->date(),
        'is_active' => true,
    ];
});
