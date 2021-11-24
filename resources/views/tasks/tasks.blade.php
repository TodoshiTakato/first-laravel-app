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
            <form action="{{route('task')}}" method="post">
                @csrf
                <div class="form-group">

                    <div class="row">
                        <div class="col">
                            <label for="task">Task:</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="task" placeholder="Enter email" name="task">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-square"></i>
                                Add task
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        @if(count($tasks)>0)
            <div class="card">
                <div class="card-header">
                    Current task
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover task-table">

                        <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                        </thead>

                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>
                                    <form action="{{url('task/'.$task->id)}}" method="post">
                                        @csrf {{method_field('DELETE')}}
                                        <button class="btn btn-danger">
                                            Delete
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
