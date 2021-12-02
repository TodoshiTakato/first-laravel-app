<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
//    public function run()
//    {
//        User::create([
//            'name' => Str::random(10),
//            'username' => Str::random(10),
//            'email' => Str::random(10).'@gmail.com',
//            'password' => Hash::make('123'),
//        ]);
//    }
    public function run()
    {
        factory(User::class)->create();
    }
}
