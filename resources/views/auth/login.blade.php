@extends('layout.base')

@section('content1')
    <?php error_reporting(E_ALL); ?>
    <div class="grid-container">
        <div></div> {{-- 1 --}}
        <div> {{-- 2 --}}
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            @include('tasks.errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div> {{-- 3 --}}
        <div></div> {{-- 4 --}}
        <div class="col">
            <div class="text-center"><h1>Login page</h1></div>
            <br>
            <form action="" method="POST">
                @csrf
                <div class="form-group d-flex1 justify-content-center">
                    <input type="text" name="username" placeholder="Username" class="form-control text-center1 w-50">
                </div>
                <div class="form-group d-flex1 justify-content-center">
                    <input type="password" name="password" placeholder="Password" class="form-control text-center1 w-50">
                </div>
                <div class="col p-3">
                <div class="row form-group d-flex1 justify-content-between">
                    <div class="col d-flex1 justify-content-start align-items-center">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="col d-flex1 justify-content-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="col d-flex1 justify-content-end align-items-center">
                        <a href="#">Register</a>
                    </div>
                </div>
                </div>
            </form>
        </div> {{-- 5 - center --}}
        <div></div> {{-- 6 --}}
        <div></div> {{-- 7 --}}
        <div></div> {{-- 8 --}}
        <div></div> {{-- 9 --}}
    </div>

@endsection
