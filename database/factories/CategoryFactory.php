<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'name' => $faker->unique()->word,
//        'parent_id' => $faker->optional($weight = 0.2, $default = null)->randomElement([1,2,3,4,5,6,7,8]),
//        'parent_id' => factory(Category::class)->make(),
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

$factory->afterCreating(Category::class, function ($category, $faker) {
//    $category->parent_category()->save(factory(Category::class)->make());
    $category->child_category()->associate($faker->optional($weight = 0.2, $default = null)->randomElement([1,2,3,4,5,6,7,8]));
    $category->save();
});
