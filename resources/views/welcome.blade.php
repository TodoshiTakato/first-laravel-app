<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >

    </head>
    <body>

{{--    <form method="post" action="{{route('photos.store')}}">--}}
{{--        @csrf--}}
{{--        <input type="text">--}}
{{--        <button type="submit">submit</button>--}}
{{--    </form>--}}

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    First Laravel App
                </div>

                <div class="links m-b-md">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <div class="links">
                    1. <a href="/hello0000">/hello0000</a>
                    2. <a href="/hello0001">/hello0001</a>
                    3. <a href="/hello0002">/hello0002 Alex</a>
                    4. <a href="/hello0003">/hello0003 Smith</a>
                    5. <a href="/hello0004">/hello0003 John</a>
                    6. <a href="/user">/user</a>
                    7. <a href="/user/'some_variable'">/user/'some_variable'</a>
                </div>

                <div class="flex-center">
                    <div class="cards">
                        <a href="http://127.0.0.1:8000/categories" class="big no-decoration">Categories: </a>
                        <ul>
                            @foreach($categories as $category)
                            @if($category->parent_id == null)
                                <li>
                                    <a href="http://127.0.0.1:8000/categories/{{ $category->id }}"
                                       class="big no-decoration"> {{ $category->name }} </a>
                                </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="cards">
                        <a href="http://127.0.0.1:8000/products" class="big no-decoration">Products</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

