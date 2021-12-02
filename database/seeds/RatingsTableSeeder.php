<?php

use Illuminate\Database\Seeder;
use App\Rating;


class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Rating::class)->create()
//            ->each(
//                function ($rating) {
//                    $rating->task()->associate(         //Создаёт кажому рейтингу по таску, учитываются и рейтинги, которые были до этого
//                        factory(App\Task::class)->create()
//                    );
//                }
//            );
        factory(Rating::class)->create();
    }
}
