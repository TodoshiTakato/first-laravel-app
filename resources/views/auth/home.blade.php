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
                                                @method('POST')
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

                <div class="container">
                    <h2>Welcome, {{Auth::user()->username}}!</h2>
                    <div class="card">

                        <div class="card-header">
                            Username: {{Auth::user()->username}}
                        </div>

                        <div class="card-body">
                            <table class="table table-hover task-table table-bordered">

                                <thead class="thead-dark">
                                <th>Key:</th>
                                <th>Value:</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>ID</td><td>{{Auth::user()->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail</td><td>{{Auth::user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail verified at</td><td>{{Auth::user()->email_verified_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td><td>{{Auth::user()->password}}</td>
                                    </tr>
                                    <tr>
                                        <td>Remember Token:</td><td>{{Auth::user()->remember_token}}</td>
                                    </tr>
                                    <tr>
                                        <td>Created at:</td><td>{{Auth::user()->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Updated at:</td><td>{{Auth::user()->updated_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Auth::viaRemember():</td><td>@dump(\Illuminate\Support\Facades\Auth::viaRemember())</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                @method('POST')
                            </form>
                        </div>
                    </div>
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
