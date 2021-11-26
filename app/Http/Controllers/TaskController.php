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

        if ( $validator->fails() ) {
            return redirect()->route('tasks_main_page')->withErrors($validator)->withInput();
        }
        else {
            $task = new Task();
            $task->name = $request->task;

            if ( !( $task->save() ) ) {
                return redirect()->route('tasks_main_page')
                    ->withErrors($validator)
                    ->withInput();
            }

            return redirect()->route('tasks_main_page');
        }
    }

    public function update_page($task_ID)
    {
        $found_task = Task::find($task_ID);
        return view('tasks.update_a_task', ['found_task' => $found_task]);
    }

    public function update(Request $request, $found_task)
    {
        $validator = Validator::make($request->all(), ['task' => 'required|max:255']);
        $task = Task::find($found_task);

//        $validatedData = $request->validate([                   // Альтернатива
//            "task" => "required|max:255"
//        ]);

        if ( $validator->fails() ) {
            return redirect()->route('update_task_page', $task->id)->withErrors($validator)->withInput();
        }

        else {
            $task->name = $request->task;

            if (!($task->update())) {
                return redirect()->route('tasks_main_page')
                    ->withErrors($validator)
                    ->withInput();
            }

            return redirect()->route('tasks_main_page');
        }
    }

    public function delete($task_ID)
    {
        $found_task = Task::find($task_ID);

        $found_task->delete();
        return redirect()->route('tasks_main_page');
    }

}
