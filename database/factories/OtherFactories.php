<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/



$factory->define(App\Cap::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker ->text,
        'image' => $faker-> imageUrl($width = 640, $height = 480),
        'price' => $faker->randomNumber(2),
        'category_id' => factory('App\Category')->create()->id,
        'supplier_id' => factory('App\Supplier')->create()->id,
    ];
});
