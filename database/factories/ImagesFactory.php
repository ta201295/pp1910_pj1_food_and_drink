<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $imageable = [
        User::class,
        Post::class,
        Product::class,
    ];
    $imageableType = $faker->randomElement($imageable);
    $imageable = factory($imageableType)->create();

    return [
        'imageable_type' => $imageableType,
        'imageable_id' => $imageable->id,
        'url' => $faker->url,
    ];
});