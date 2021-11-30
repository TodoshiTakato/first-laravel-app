@extends('layout.base')

@section('content1')
    <?php error_reporting(E_ALL); ?>
    <div class="grid-container">
        <div></div> {{-- 1 --}}
        <div>
            <div class="h-100-1 w-100-1">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>
                            <!-- Right Side Of Navbar -->
                            <ul class="nav-bar ml-auto">
                                <li class="nav-item1">
                                    <div class="dropdown1">
                                        <a href="#" class="dropbtn">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown1-content">
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div> {{-- 2 --}}
        <div></div> {{-- 3 --}}
        <div></div> {{-- 4 --}}
        <div> {{-- 5 - center --}}


            <h1>Home page</h1>
            <br>

            @isset(Auth::user()->id)

                <div class="big">
                    Welcome, {{Auth::user()->username}}!<br>
                </div>
                <div>
                    id: {{Auth::user()->id}}<br>
                    email: {{Auth::user()->email}}<br>
                    username: {{Auth::user()->username}}<br>
                    email_verified_at: {{Auth::user()->email_verified_at}}<br>
                    password:<br>{{Auth::user()->password}}<br>
                    remember_token:<br>{{Auth::user()->remember_token}}<br>
                    created_at: {{Auth::user()->created_at}}<br>
                    updated_at: {{Auth::user()->updated_at}}<br>
                    Auth::viaRemember(): @dump(\Illuminate\Support\Facades\Auth::viaRemember())
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

            @else
                <script>
                    {{--window.location = "{{route('login')}}";--}}
                </script>
            @endisset

            @isset($data)
            @foreach($data as $key => $value)
                {{$key}}: {{$value}}<br>
            @endforeach
            @endisset

        </div> {{-- 5 - center --}}
        <div></div> {{-- 6 --}}
        <div></div> {{-- 7 --}}
        <div></div> {{-- 8 --}}
        <div></div> {{-- 9 --}}
    </div>

@endsection
