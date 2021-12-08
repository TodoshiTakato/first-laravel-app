<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'name' => $faker->unique()->word,
//        'parent_id' => factory(Category::class),
        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

//$factory->afterCreating(Category::class, function ($category, $faker) {
//    $category->parent_category()->save(factory(Category::class)->make());
//    $category->child_category()->associate(factory(Category::class)->make());
//    $category->save();
//});
