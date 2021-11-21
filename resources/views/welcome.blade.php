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
                <div class="cards">
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

                <div class="grid-container" style="grid-gap: 1px; padding: 1px;">
                    <div><a class="no-decoration" href="/hello0000">1. /hello0000</a></div>
                    <div><a class="no-decoration" href="/hello0001">2. /hello0001</a></div>
                    <div><a class="no-decoration" href="/hello0002">3. /hello0002 Alex</a></div>
                    <div><a class="no-decoration" href="/hello0003">4. /hello0003 Smith</a></div>
                    <div><a class="no-decoration" href="/hello0004">5. /hello0003 John</a></div>
                    <div><a class="no-decoration" href="/user">6. /user</a></div>
                    <div><a class="no-decoration flex-center" href="/user/'some_variable'">7. /user/'some_variable'</a></div>

                    <div style="grid-column: 2 / 4">
                        <form action="/index.php" method="post" autocomplete="on" id="var_form"
                              oninput=" let new_link = '/user/'.concat(variable.value)
                                        link.value = 'link'
                                        myAnchor.href = new_link ">
                            @csrf
                            <label for="variable">Input: </label>
                            <input type="text" name="variable" id="variable" placeholder="Variable">

                            <a id="myAnchor" style="color: crimson"><output name="link" for="variable" form="var_form"></output></a>
                        </form>

                    </div>
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
        </div>
    </body>
</html>

