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

            <div class="col-2">
                <a href="{{route('update_task_page')}}">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-plus-square"></i>
                        Add task
                    </button>
                </a>
            </div>

        </div>

        @isset($tasks)
            <div class="card">
                <div class="card-header">
                    All tasks:
                    @dump($minmax_array)
{{--                    {{$maxprice}}/{{$minprice}}--}}
                </div>
                <div class="card-body">
                    <table class="table table-hover task-table table-bordered">

                        <thead class="thead-dark">
                            <th>Task:</th>
                            <th>Rating:</th>
                            <th>Deletion:</th>
                            <th>Editing:</th>
                        </thead>

                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="col-md-6 text-break">
                                    <a href="{{route('task_info_page', $task->id)}}">{{$task->name}}</a>
                                </td>
                                <td class="col-md-2">
                                    <div class="rate">
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        {{$task->rating()}}
                                    </div>
                                </td>
                                <td class="col-md-2">
                                    <form action="{{route('delete_a_task', $task->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
{{--                                        {{method_field('delete')}}--}}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>

                                <td class="col-md-2">
                                    <form action="{{route('update_task_page', $task->id)}}" method="GET">
                                        @csrf
                                        @method('GET')
{{--                                        {{method_field('get')}}--}}
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
                    {{$tasks->links()}}
                </div>
            </div>
        @endisset
    </div>
@endsection
