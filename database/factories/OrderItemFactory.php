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
        'item_price' => $faker->numberBetween($min = 1000000, $max = 10000000), // add 00 at the end because price is integer
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

