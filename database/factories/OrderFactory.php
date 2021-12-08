<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'total_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100000),
        'paid' => $faker->randomElement($array = array (true, false)),
        'user_id' => factory(App\User::class),
        'paid_at' => $faker->dateTimeBetween('-4 months', 'now', null),
        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

//$factory->afterCreating(App\Order::class, function ($order, $faker) {
//    $order->user()->associate(factory(App\User::class)->make());
//    $user = factory(App\User::class)->make();
//    $order->user()->associate($user);
//    $order->order_items()->save(factory(App\OrderItem::class)->make());
//});
