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
        $tasks = Task::orderBy('created_at', 'asc')->paginate(5);
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

//        if ( $validated->fails() ) {
//            if ($request->rating > 5 || $request->rating < 1) {
//                throw new InvalidArgumentException('Ratings must be between 1-5.');
//            }
//            return redirect()->route('tasks_main_page')->withErrors($validated)->withInput();
//        }
//        else {
//            $task = new Task();
//            $task->name = $request->task;
//
//            if ( !( $task->save() ) ) {
//                return redirect()->route('tasks_main_page')
//                    ->withErrors($validator)
//                    ->withInput();
//            }

        $rating = $request->rating;
        $task->ratings()->updateOrCreate(['task_id' => $task->id, 'user_id' => Auth::id()], compact('rating'));

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
