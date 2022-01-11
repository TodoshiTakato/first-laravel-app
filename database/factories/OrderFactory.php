<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'user_id' => factory(\App\User::class),
        'total_price' => $faker->numberBetween($min = 1000000, $max = 10000000), // add 00 at the end because price is integer
        'paid' => $faker->randomElement($array = array (true, false)),
        'paid_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

