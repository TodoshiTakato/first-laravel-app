@extends('layout.base')

@section('content1')
    <?php error_reporting(E_ALL); ?>

    @if(Auth::user())
        <script>
            window.location = "{{route('main_page')}}";
        </script>
    @endif

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
                    @method('POST')
                    <div class="form-group row align-items-center">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input id="username" type="text" name="username" value="{{ old('username') }}" required
                                   autocomplete="username" placeholder="Username" class="form-control text-center1"
                                   autofocus>
{{--                            @error('username') <div class="form-group alert alert-danger"> Неверное имя пользователя </div> @enderror--}}
                            @error('username') <div class="form-group alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control text-center1">
{{--                            @error('password') <div class="form-group alert alert-danger"> Введите пароль </div> @enderror--}}
                            @error('password') <div class="form-group alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row align-items-center text-nowrap">

                        <div class="col">
                            <a href="#">Forgot password?</a>
                        </div>

                        <div class="col text-center1">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="col text-right">
                            <a href="{{ route('register') }}">Register</a>
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
