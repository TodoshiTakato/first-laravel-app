<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    $starts_at = Carbon::createFromTimestamp(
        $faker
            ->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')
            ->getTimeStamp()
    );
    $ends_at = Carbon::createFromFormat('Y-m-d H:i:s', $starts_at)
        ->addHours( $faker->numberBetween( 1, 8 ) );
    $time_spent = $starts_at->diffInHours($ends_at);
    return [
        'user_id' => factory(\App\User::class),
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'details' => $faker->realTextBetween($minNbChars = 60, $maxNbChars = 80, $indexSize = 2),
        'status' => $faker->randomElement(array(0, 1)),
        'priority' => $faker->randomElement(array(0, 1, 2, 3, 4, 5)),
        'start_time' => $starts_at,
        'finish_time' => $ends_at,
        'time_spent' => $time_spent,
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});
