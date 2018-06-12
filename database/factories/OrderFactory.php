<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        // 'quantity' => $faker ->randomNumber(2) ,
        'receiver_name' =>$faker ->name,
        'address' => $faker ->address,
        'status' => $faker  ->numberBetween($min = 0, $max = 2),
        'user_id' => $faker ->numberBetween ($min=2, $max=4),
    ];
});
