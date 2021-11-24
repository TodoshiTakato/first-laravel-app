<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks.tasks', compact('tasks'));
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), ['task'=>'required|max:255']);

//        $validatedData = $request->validate([                   // Альтернатива
//            "task" => "required|max:255"
//        ]);

        if ($validator->fails()) {
            return redirect('/tasks')->withErrors($validator)->withInput();
        }

        $task = new Task();
        $task->name = $request->task;
        $task->save();

        return redirect()->route('get_task');
    }

    public function delete(Task $task_id)
    {
        $task_id->delete();
        return redirect('/tasks');
    }
}
