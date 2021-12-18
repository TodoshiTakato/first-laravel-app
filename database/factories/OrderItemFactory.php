<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'order_id' => factory(\App\Order::class),
        'product_id' => App\Product::all()->pluck('id')->random(),
        'quantity' => $faker->randomNumber($nbDigits = 2, $strict = false),
        'item_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 2000),
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

