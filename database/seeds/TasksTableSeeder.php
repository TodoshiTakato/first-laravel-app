<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 1)->create()
            ->each(
                function ($task) {
                    $task->ratings()->createMany(
                        factory(App\Rating::class, 1)->make()->toArray()
                    );
                }
            );
//        factory(Task::class, 100)->create();
    }
}
