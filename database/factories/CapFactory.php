<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cap::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'name' => $faker->name,
        'description' => $faker ->text,
        'image' => $faker-> imageUrl($width = 640, $height = 480),
        'price' => $faker->randomNumber(2),
        'category_id' => factory('App\Models\Category')->create()->id,
        'supplier_id' => factory('App\Models\Supplier')->create()->id,
    ];
});
