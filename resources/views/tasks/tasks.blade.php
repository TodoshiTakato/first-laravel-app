@extends('layout.base')

@section('content1')
    <?php error_reporting(E_ALL); ?>

    <div class="col">

        <div class="row">
            <div class="card-body">
                @include('tasks.errors')
            </div>
        </div>

        <div class="row">
            <form action="{{route('post_a_task')}}" method="post" class="col">
                @csrf
                <div class="form-group">

                    <div class="row">
                        <div class="col">
                            <label for="task">Task:</label>
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="task" name="task"
                                   placeholder="Enter a task name">
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-square"></i>
                                Add task
                            </button>
                        </div>
                        <div class="col-4 text-danger d-flex align-items-center">
                            @error('task')
                            {{$message}}
                            @enderror
                        </div>
                    </div>


                </div>
            </form>
        </div>

        @if(count($tasks)>0)
            <div class="card">
                <div class="card-header">
                    All tasks:
                </div>
                <div class="card-body">
                    <table class="table table-hover task-table table-bordered">

                        <thead class="thead-dark">
                            <th>Task:</th>
                            <th>Deletion:</th>
                            <th>Editing:</th>
                        </thead>

                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="col-md-8">
                                    {{$task->name}}
                                </td>
                                <td class="col-md-2">
                                    <form action="{{route('delete_a_task', $task->id)}}" method="post">
                                        @csrf
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>

                                <td class="col-md-2">
                                    <form action="{{route('update_task_page', $task->id)}}" method="get">
                                        @csrf
                                        {{method_field('get')}}
                                        <button type="submit" class="btn btn-dark">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        @endif

    </div>
@endsection
