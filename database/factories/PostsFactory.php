<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->sentence,
        'content' =>$faker->text,
        'slug' =>$faker->unique()->slug,
    ];
});