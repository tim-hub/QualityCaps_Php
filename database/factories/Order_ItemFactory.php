<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order_Item::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'quantity' => $faker ->randomNumber(2),
        'cap_id' => $faker  ->numberBetween($min = 1, $max = 10),
        'order_id' => $faker ->numberBetween ($min=1, $max=10),
    ];
});
