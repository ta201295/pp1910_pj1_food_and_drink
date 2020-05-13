<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $size = [
        'small',
        'medium',
        'big',
    ];
    return [
        'name' => $faker->word,
        'image' => '/img/product ('.$faker->unique()->numberBetween(1, 100).').jpg',
        'size' => $faker->randomElement($size),
        'price' => $faker->numberBetween(100000, 10000000),
        'category_id' =>  Category::all()->random()->id,
        'description' => $faker->text,
    ];
});