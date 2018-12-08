<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price_per_unit' => $faker->numberBetween(1, 99999) / 100,
        'unit' => 'piece',
        'weight' => $faker->numberBetween(100, 9000),
        'manufactured_in' => $faker->country,
        'stock' => $faker->numberBetween(0, 99),
        'description' => $faker->text(500),
        'short_description' => $faker->text(50),
        'extra_description' => $faker->text(50),
    ];
});
