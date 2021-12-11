@extends('layout.base')

@section('content1')
    <?php error_reporting(E_ALL); ?>

    <div class="col">

        <div class="row">
            <div class="card-body">
                @include('tasks.errors')
            </div>
        </div>

        <div class="row big text-center1">
            TASK UPDATE PAGE
        </div>

        <div class="row">
            <form action="{{route('update_a_task', $found_task->id)}}" method="post"
                  id="task_info" class="col">
            @csrf
            @method('PUT') {{--  {{method_field('put')}}  --}}
                <div class="row form-group">
                    <label for="name">Task name:</label>
                    <input type="text" id="name" name="name" value="{{$found_task->name}}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('task')<div class="invalid-feedback"><strong>{{$message}}</strong></div>@enderror
                </div>
                <div class="row form-group">
                    <label for="details">Task details:</label>
                    <input type="text" id="details" name="details" value="{{$found_task->details}}"
                           class="form-control @error('details') is-invalid @enderror">
                    @error('details')<div class="invalid-feedback"><strong>{{$message}}</strong></div>@enderror
                </div>
                <div class="row">
                    <div class="w-30 input-group justify-content-between align-items-center">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="status">Task status:</label>
                        </div>
                        <div class="d-flex">
                            <input type="checkbox" id="status" name="status" value="1"
                                   class="form-control @error('status') is-invalid @enderror">
                            <script>
                                document.getElementById("status").value = "{{$found_task->status}}";
                            </script>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                (<i class="fas fa-check-square"></i> - Done, <i class="fas fa-square"></i> - Not Done)
                            </span>
                        </div>
                        @error('status')<div class="invalid-feedback"><strong>{{$message}}</strong></div>@enderror
                    </div>
                    <div class="w-2">
                    </div>
                    <div class="w-25 input-group justify-content-between align-items-center">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="priority">Task priority:</label>
                        </div>
                        <div class="px-2">
                            <input type="range" id="priority" name="priority"
                                   min="0" max="5" step="1" oninput="priority_output.value = this.value"
                                   class="form-control @error('priority') is-invalid @enderror">
                            <script>
                                document.getElementById("priority").value = "{{$found_task->priority}}";
                                document.getElementById("priority_output").value = "{{$found_task->priority}}";
                            </script>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <output style="font-size: 24px;"
                                        name="priority_output" for="priority" id="priority_output">
                                    {{$found_task->priority}}
                                </output>
                            </span>
                        </div>
                        @error('priority')<div class="invalid-feedback"><strong>{{$message}}</strong></div>@enderror
                    </div>
                    <div class="w-3">
                    </div>
                </div>

                <div class="row form-group">
                    <label for="start_time">Task start_time:</label>
                    <input type="datetime-local" id="start_time" name="start_time" value="{{$found_task->start_time}}"
                           class="form-control @error('start_time') is-invalid @enderror" step="1">
                    @error('start_time')<div class="invalid-feedback"><strong>{{$message}}</strong></div>@enderror
                </div>
                <div class="row form-group">
                    <label for="finish_time">Task finish_time:</label>
                    <input type="datetime-local" id="finish_time" name="finish_time" value="{{$found_task->finish_time}}"
                           class="form-control @error('finish_time') is-invalid @enderror">
                    @error('finish_time')<div class="invalid-feedback"><strong>{{$message}}</strong></div>@enderror
                </div>
                <div class="row form-group">
                    <label for="time_spent">Task time_spent:</label>
                    <input type="text" id="time_spent" name="time_spent" value="{{$found_task->time_spent}}"
                           class="form-control @error('time_spent') is-invalid @enderror">
                    @error('time_spent')<div class="invalid-feedback"><strong>{{$message}}</strong></div>@enderror
                </div>

                <hr>

                <div id="rate" class="row">
                    <div class="col-3 d-flex align-items-center" style="font-size: 55px; font-weight: 900;">
                        <span>Rating: {{$found_task->rating()}}</span>
                    </div>
                    <table class="table table-bordered col-1">
                        <thead><tr><th class="p-0">1</th><th class="p-0">2</th><th class="p-0">3</th><th class="p-0">4</th><th class="p-0">5</th></tr></thead>
                        <tbody>
                        <tr>
                            <td class="p-0"><input type="radio" id="rating-1" name="rating" value="1"
                                                   oninput="
                                                   star1.setAttribute('class', 'bi-star-fill text-warning')
                                                   star2.setAttribute('class', 'bi-star text-warning')
                                                   star3.setAttribute('class', 'bi-star text-warning')
                                                   star4.setAttribute('class', 'bi-star text-warning')
                                                   star5.setAttribute('class', 'bi-star text-warning')
                                                        "></td>
                            <td class="p-0"><input type="radio" id="rating-2" name="rating" value="2"
                                                   oninput="
                                                   star1.setAttribute('class', 'bi-star-fill text-warning')
                                                   star2.setAttribute('class', 'bi-star-fill text-warning')
                                                   star3.setAttribute('class', 'bi-star text-warning')
                                                   star4.setAttribute('class', 'bi-star text-warning')
                                                   star5.setAttribute('class', 'bi-star text-warning')
                                                   "></td>
                            <td class="p-0"><input type="radio" id="rating-3" name="rating" value="3"
                                                   oninput="
                                                   star1.setAttribute('class', 'bi-star-fill text-warning')
                                                   star2.setAttribute('class', 'bi-star-fill text-warning')
                                                   star3.setAttribute('class', 'bi-star-fill text-warning')
                                                   star4.setAttribute('class', 'bi-star text-warning')
                                                   star5.setAttribute('class', 'bi-star text-warning')
                                                   "></td>
                            <td class="p-0"><input type="radio" id="rating-4" name="rating" value="4"
                                                   oninput="
                                                   star1.setAttribute('class', 'bi-star-fill text-warning')
                                                   star2.setAttribute('class', 'bi-star-fill text-warning')
                                                   star3.setAttribute('class', 'bi-star-fill text-warning')
                                                   star4.setAttribute('class', 'bi-star-fill text-warning')
                                                   star5.setAttribute('class', 'bi-star text-warning')
                                                   "></td>
                            <td class="p-0"><input type="radio" id="rating-5" name="rating" value="5"
                                                   oninput="
                                                   star1.setAttribute('class', 'bi-star-fill text-warning')
                                                   star2.setAttribute('class', 'bi-star-fill text-warning')
                                                   star3.setAttribute('class', 'bi-star-fill text-warning')
                                                   star4.setAttribute('class', 'bi-star-fill text-warning')
                                                   star5.setAttribute('class', 'bi-star-fill text-warning')
                                                   "></td>
                        </tr>
                        <tr>
                            <td class="p-0"><i id="star1" class="bi bi-star text-warning"></i></td>
                            <td class="p-0"><i id="star2" class="bi bi-star text-warning"></i></td>
                            <td class="p-0"><i id="star3" class="bi bi-star text-warning"></i></td>
                            <td class="p-0"><i id="star4" class="bi bi-star text-warning"></i></td>
                            <td class="p-0"><i id="star5" class="bi bi-star text-warning"></i></td>
                        </tr>
                        </tbody>
                        <script>
                            document.getElementById("priority").value = "{{$found_task->priority}}";
                            document.getElementById("priority_output").value = "{{$found_task->priority}}";
                        </script>
                    </table>
                </div>

                <div class="row">
                    <div class="col text-center1">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Save changes
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
