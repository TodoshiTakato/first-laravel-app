<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $faker->setDefaultTimezone('Asia/Tashkent');
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'price' => $faker->numberBetween($min = 1000000, $max = 10000000), // add 00 at the end because price is integer
        'status' => $faker->randomElement($array = array (0, 1)),
        'category_id' => App\Category::all()->pluck('id')->random(),
//        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
//        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
    ];
});

//$factory->afterCreating(App\Product::class, function ($product, $faker) {
//    $category = factory(App\Category::class)->make();
//    $product->category()->associate($category);
//    $order_item = factory(App\OrderItem::class)->make();
//    $product->order_item()->associate($order_item);
//    $product->category()->associate(factory(App\Category::class)->make());
//    $product->order_item()->associate(factory(App\OrderItem::class)->make());
//});
