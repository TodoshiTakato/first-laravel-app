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
                <div class="big text-center">Register page</div>
                <br>

                @include('auth.auth_errors')

                <form action="{{route('login_verify')}}" method="POST">
                    @csrf

                    <div class="form-group row align-items-center">
                        <label for="username" class="col-md-4 col-form-label text-md-right">
                            {{ __('Username') }}
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="username" name="username" value="{{ old('username') }}" required
                                   class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="name" class="col-md-4 col-form-label text-md-right">
                            {{ __('Name') }}
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                   autofocus class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="email" class="col-md-4 col-form-label text-md-right">
                            {{ __('E-Mail Address') }}
                        </label>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="password" class="col-md-4 col-form-label text-md-right">
                            {{ __('Password') }}
                        </label>
                        <div class="col-md-6">
                            <input type="password" id="password" name="password" value="{{ old('password') }}" required
                                   autocomplete="new-password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">
                            {{ __('Confirm Password') }}
                        </label>
                        <div class="col-md-6">
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                   value="{{ old('password_confirmation') }}" autocomplete="new-password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col text-center1">
                            <button type="submit" class="btn btn-primary">Register</button>
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