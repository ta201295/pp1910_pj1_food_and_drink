<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Rate::class, function (Faker $faker) {
    return [
        'point' => $faker->randomFloat(1, 1, 5),
        'user_id' => User::all()->random()->id,
        'product_id' => Product::all()->random()->id,
    ];
});