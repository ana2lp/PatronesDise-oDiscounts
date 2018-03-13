<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'in_stock' => $faker->randomDigit,
        'category_id' => function() {
            factory(\App\Category::class)->create();
        },
    ];
});
