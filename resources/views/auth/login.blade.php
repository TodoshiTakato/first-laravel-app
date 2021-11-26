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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div> {{-- 3 --}}
        <div></div> {{-- 4 --}}
        <div>
            <div class="d-block w-100-1 h-25">
                @if (Route::has('login'))   <!-- Authentication -->
                    <div class="d-flex justify-content-between">
                        @auth
                            <div><a href="{{ url('/home') }}">Home</a></div>
                        @else
                            <div><a href="{{ route('login') }}">Login</a></div>

                            @if (Route::has('register'))
                                <div><a href="{{ route('register') }}">Register</a></div>
                            @endif
                        @endauth
                    </div>
                @endif   <!-- Authentication -->
                </div>
            <div class="w-50 flex-grow-1 align-items-center">
                <div class="text-center"><h1>Login page</h1></div>
                <br>

                @include('auth.auth_errors')

                <form action="{{route('login_verify')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control text-center1">
                    </div>
                    @error('username') <div class="form-group alert alert-danger"> {{$message}} </div> @enderror

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control text-center1">
                    </div>
                    @error('password') <div class="form-group alert alert-danger"> {{$message}} </div> @enderror

                    <div class="row align-items-center text-nowrap">

                        <div class="col">
                            <a href="#">Forgot password?</a>
                        </div>

                        <div class="col text-center1">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="col text-right">
                            <a href="#">Register</a>
                        </div>

                    </div>

                </form>
            </div>
            <div class="h-25">
            </div>
        </div> {{-- 5 - center --}}
        <div></div> {{-- 6 --}}
        <div></div> {{-- 7 --}}
        <div></div> {{-- 8 --}}
        <div></div> {{-- 9 --}}
    </div>

@endsection
