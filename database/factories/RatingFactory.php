<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'comments' => $faker->text(200),
        'user_id' => factory(App\User::class),
//        'task_id' => factory(App\User::class),
        'rating' => $faker->randomElement(array('1','2','3', '4', '5')),
        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});
