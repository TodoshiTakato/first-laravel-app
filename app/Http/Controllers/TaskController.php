<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use \Debugbar;
use InvalidArgumentException;

//use mysql_xdevapi\Exception;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'asc')->paginate(9);
        $string_with_256_symbols = Str::random(256);

        Debugbar::info($string_with_256_symbols);    // Debugbar usage example
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        return view('tasks.tasks', compact('tasks', 'string_with_256_symbols'));
    }

    public function post(TaskPostRequest $request)
    {
        $validated = $request->validated();
        $task = Task::create($validated);
        if ($request->rating) {
            $task->rate($request->rating, Auth::user());
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
