<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    $payment = [
        'Bằng tiền mặt',
        'Trả qua thẻ',
        'Trả qua app',
      ];
    return [
        'order_id' => Order::all()->random()->id,
        'purchase_method' => $faker->randomElement($payment),
    ];
});