<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks.tasks', compact('tasks'));
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), ['task' => 'required|max:255']);

//        $validatedData = $request->validate([                   // Альтернатива
//            "task" => "required|max:255"
//        ]);

        if ($validator->fails()) {
            return redirect()->route('tasks_main_page')->withErrors($validator)->withInput();
        }

        $task = new Task();
        $task->name = $request->task;

        if (!$task->save()) {
            return redirect()->route('tasks_main_page')->withErrors('sdss')->withInput();
        }

        return redirect()->route('tasks_main_page');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['task' => 'required|max:255']);

//        $validatedData = $request->validate([                   // Альтернатива
//            "task" => "required|max:255"
//        ]);

        if ($validator->fails()) {
            return redirect()->route('tasks_main_page')->withErrors($validator)->withInput();
        }

        $task = new Task();
        $task->name = $request->task;

        if (!$task->save()) {
            return redirect()->route('tasks_main_page')->withErrors('sdss')->withInput();
        }

        return redirect()->route('tasks_main_page');
    }

    public function delete(Task $task_id)
    {
        $task_id->delete();
        return redirect()->route('tasks_main_page');
    }
}
