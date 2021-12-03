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
            <form action="{{route('update_a_task', $found_task->id)}}" method="post" class="col">
                @csrf
                @method('PUT')
{{--                {{method_field('put')}}--}}
                <div class="form-group">

                    <div class="row">
                        <div class="col">
                            <label for="task">Task:</label>
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="task" name="task" value="{{$found_task->name}}">
                        </div>

                        <div class="col">checked
                            <div id="rate" class="">
                                <span>
                                    <input type="radio" class="" id="rating-1" name="rating" value="1">
                                    <input type="radio" class="" id="rating-2" name="rating" value="2">
                                    <input type="radio" class="" id="rating-3" name="rating" value="3">
                                    <input type="radio" class="" id="rating-4" name="rating" value="4">
                                    <input type="radio" class="" id="rating-5" name="rating" value="5">
                                </span>
                                <span>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </span>
                                <span style="background: #1d2124; color: #ffffff">: {{$found_task->rating()}}</span>
                            </div>
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Save changes
                            </button>
                        </div>
                        <div class="col-4 text-danger d-flex align-items-center">
                            @error('task') {{$message}} @enderror
                        </div>
                    </div>


                </div>
            </form>
        </div>

    </div>
@endsection
