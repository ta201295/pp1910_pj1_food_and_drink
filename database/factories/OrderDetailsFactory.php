<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'order_id' => Order::all()->random()->id,
        'quantity' => $faker->numberBetween(1, 1000),
        'total_price' => $faker->numberBetween(100000, 100000000),
    ];
});