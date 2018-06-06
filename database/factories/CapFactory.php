<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cap::class, function (Faker $faker) {

    $img_id = (int)$faker->numberBetween($min = 1, $max = 40);

    return [
        // 'name' => $faker->name,
        'name' => $faker->name,
        'description' => $faker ->text,
        'price' => $faker->randomNumber(2),
        'image' => 'https://picsum.photos/400/300?image='.$img_id,
        'category_id' => factory('App\Models\Category')->create()->id,
        'supplier_id' => factory('App\Models\Supplier')->create()->id,
    ];
});
