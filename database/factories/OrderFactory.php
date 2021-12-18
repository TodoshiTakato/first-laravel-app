<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'user_id' => factory(\App\User::class),
        'total_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100000),
        'paid' => $faker->randomElement($array = array (true, false)),
        'paid_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

