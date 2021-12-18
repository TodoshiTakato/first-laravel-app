<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'rating' => $faker->randomElement(array('1','2','3', '4', '5')),
        'comment' => $faker->realTextBetween($minNbChars = 60, $maxNbChars = 80, $indexSize = 2),
        'user_id' => factory(App\User::class),
        'task_id' => factory(App\Task::class),
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});
