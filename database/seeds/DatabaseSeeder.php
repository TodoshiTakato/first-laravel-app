<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);

//        $this->call([
//            UsersTableSeeder::class,
//            TasksTableSeeder::class,
//            RatingsTableSeeder::class,
//        ]);

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
//        $this->call(OrderItemSeeder::class);
//        $this->call(OrderSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
