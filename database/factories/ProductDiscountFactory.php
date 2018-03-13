<?php

use Faker\Generator as Faker;

$factory->define(App\ProductDiscount::class, function (Faker $faker) {
    return [
        'product_id' => null,
        'value' => 30,
        'unit' => 'PERCENTAGE',
        'valid_from' => $faker->date(),
        'valid_until' => $faker->date(),
        'coupon_code' => $faker->uuid,
        'minimum_order_value' => 100,
        'maximum_discount_amount' => 1000,
    ];
});
