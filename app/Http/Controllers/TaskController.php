<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
//use mysql_xdevapi\Exception;
//use Illuminate\Support\Facades\Validator;
use \Debugbar;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->paginate(5);
        $faker = new Faker;
//        $string_with_256_symbols = $faker->text(110);
        $string_with_256_symbols = Str::random(256);

        Debugbar::info($string_with_256_symbols);    // Debugbar usage example
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        return view('tasks.tasks', compact('tasks', 'string_with_256_symbols'));
    }

    public function task_info($task_ID)
    {
        $task = Task::find($task_ID);
        return view('tasks.task_info', ['task' => $task]);
    }

    public function post(TaskPostRequest $request)
    {
        $validated = $request->validated();
        $task = Task::create([
            'name' => $validated->name,
            'details' => $validated->details,
            'status' => $validated->status,
            'priority' => $validated->priority,
            'start_time' => $validated->start_time,
            'finish_time' => $validated->finish_time,
            'time_spent' => $validated->time_spent,
        ]);
        if ($validated->rating) {
            $task->rate($validated->rating, Auth::user());
        }
        return redirect()->route('tasks_main_page');
    }

    public function update_page($task_ID)
    {
        $found_task = Task::find($task_ID);
        return view('tasks.update_a_task', ['found_task' => $found_task]);
    }

    public function update(TaskPostRequest $request, $found_task)
    {
        $task = Task::find($found_task);
        $task->name = $request->task;
        $task->update();
        $task->ratings();
        return redirect()->route('tasks_main_page');
    }

    public function delete($task_ID)
    {
        $found_task = Task::find($task_ID);

        $found_task->delete();
        return redirect()->route('tasks_main_page');
    }

}
