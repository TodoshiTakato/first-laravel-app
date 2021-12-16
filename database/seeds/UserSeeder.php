<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        factory(User::class, 5)
        ->create()
        ->each(
        function ($user) {
            factory(App\Order::class, 0)
            ->create(['user_id'=>$user->id])
            ->each(
            function ($order) use ($user) {
                factory(App\OrderItem::class, 0)
                ->create(['order_id'=>$order->id])
                ->each(
                function ($order_item) use ($user, $order) {
                    factory(App\Product::class)
                    ->make()
                    ->each(
                    function ($product) use ($user, $order, $order_item) {
                        $order_item->product_id = $product->id;
                    });
                });
            });

            factory(App\Task::class, 5)
            ->create(['user_id'=>$user->id])
            ->each(
            function ($task) use ($user) {
                factory(App\Rating::class)
                ->create([
                    'user_id'=>$user->id,
                    'task_id'=>$task->id,
                ]);
            });

        });



    }
}
