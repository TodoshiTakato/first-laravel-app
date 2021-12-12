<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Product;
use App\Task;
use App\User;
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
//        $minmax_array = Product::selectRaw('MIN(price) as min_price, MAX(price) as max_price')->get()->all();
        $minmax_array = Product::selectRaw('
            MIN(price) as min_price,
            MAX(price) as max_price
        ')->first();
//        print_r($minmax_array);
        echo $minmax_array->min_price .  '  ' .  $minmax_array->max_price;
//        $maxprice = $minmax_array['max_price'];
//        $minprice = $minmax_array['min_price'];
//        $faker = new Faker;
//        $string_with_256_symbols = $faker->text(110);

//        $string_with_256_symbols = Str::random(256);
//
//        Debugbar::info($string_with_256_symbols);    // Debugbar usage example
//        Debugbar::error('Error!');
//        Debugbar::warning('Watch out…');
//        Debugbar::addMessage('Another message', 'mylabel');
//
//        return view('tasks.tasks', compact('tasks', 'minmax_array'));
    }

    public function task_info($task_ID)
    {
        $task = Task::find($task_ID);
        return view('tasks.task_info', ['task' => $task]);
    }

    public function post(TaskPostRequest $request)
    {
        $user = Auth::user();
        $validated = $request->validated();
        $task = Task::create([
            'name' => $validated['name'],
            'details' => $validated['details'],
//            'status' => $validated['status'],
            'status' => $status = isset($validated['status']) ? $validated['status'] : null,
            'priority' => $validated['priority'],
            'start_time' => $validated['start_time'],
            'finish_time' => $validated['finish_time'],
            'time_spent' => $validated['time_spent'],
        ]);
        $task->user()->associate($user);
        if (isset($validated['rating'])) {
            $task->rate($validated['rating'], $user);
        }
        $task->save();
        return redirect()->route('tasks_main_page');
    }

    public function update_page($task_ID=null)
    {
        if (isset($task_ID)) {
            $found_task = Task::find($task_ID);
        }
        else {
            $found_task = null;
        }
        return view('tasks.update_a_task', ['found_task' => $found_task]);
    }

    public function update(TaskPostRequest $request, $found_task)
    {
        $user = Auth::user();
        $validated = $request->validated();
        $task = Task::find($found_task)->update([
            'name' => $validated['name'],
            'details' => $validated['details'],
            'status' => $status = isset($validated['status']) ? $validated['status'] : null,
            'priority' => $validated['priority'],
            'start_time' => $validated['start_time'],
            'finish_time' => $validated['finish_time'],
            'time_spent' => $validated['time_spent'],
        ]);
        if (isset($validated['rating'])) {
            $task->rate($validated['rating'], $user);
        }
        return redirect()->route('tasks_main_page');
    }

    public function delete($task_ID)
    {
        $found_task = Task::find($task_ID);

        $found_task->delete();
        return redirect()->route('tasks_main_page');
    }

}
