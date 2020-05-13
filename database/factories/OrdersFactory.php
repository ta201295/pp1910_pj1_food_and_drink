<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $status = [
      'chưa thanh toán',
      'đã thanh toán',
    ];
    return [
        'user_id' => User::all()->random()->id,
        'total_price' => $faker->numberBetween(100000, 100000000),
        'purchase_status' =>$faker->randomElement($status),
        'customer_name' => $faker->name,
        'customer_phone' => $faker->phoneNumber,
        'delivery_address' => $faker->streetAddress,
    ];
});