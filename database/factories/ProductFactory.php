<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100000),
        'status' => $faker->randomElement($array = array (0, 1)),
        'category_id' => App\Category::all()->pluck('id')->random(),
        'created_at' => $faker->dateTimeBetween('-4 months', 'now', null),
        'updated_at' => $faker->dateTimeBetween('-4 months','now', null),
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
