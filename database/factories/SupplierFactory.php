<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Supplier::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,

        'name' => $faker->name,
        'description' => $faker ->text

    ];
});
