@extends('layout.base')

@section('content1')
    <?php error_reporting(E_ALL); ?>
    @isset($task)
        <div class="card">
            <div class="card-header">
                Task info:
            </div>
            <div class="card-body">
                <table class="table table-hover task-table table-bordered">

                    <thead class="thead-dark">
                    <th>Task:</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="col text-break">
                                <div>id: {{$task->id}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>name: "{{$task->name}}"</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>details: "{{$task->details}}"</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>status: {{$task->status}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>priority: {{$task->priority}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>start_time: {{$task->start_time}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>finish_time: {{$task->finish_time}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>time_spent: {{$task->time_spent}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>created_at: {{$task->created_at}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col text-break">
                                <div>updated_at: {{$task->updated_at}}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col">
                                <div class="rate">
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    {{$task->rating()}}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col">
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
                        </tr>
                        <tr>
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
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
@endsection
