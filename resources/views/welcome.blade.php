@extends('layout.base')

@section('content')
<div class="flex-center position-ref full-height">

    <div class="text-center">   <!-- Wrapper -->
        @if (Route::has('login'))   <!-- Authentication -->
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
        @endif   <!-- Authentication -->

        <div class="cards">   <!-- Main Card in the center -->
            <div class="title m-b-md"> First Laravel App </div>   <!-- Logo Title -->

            <div class="links m-b-md"> <!-- Laravel Links -->
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
                <a class="no-decoration" href="/nurlan">nurlan</a>
            </div> <!-- Laravel Links -->

            <div class="grid-container" style="grid-gap: 1px; padding: 1px;">   <!-- Hello world Links -->
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
            </div>  <!-- Hello world Links -->


            <div class="flex-center">  <!-- DataBase Cards -->
            <div class="cards">  <!-- Categories Card -->
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
            </div>  <!-- Categories Card -->

            <div class="cards">  <!-- Products Card -->
                <a href="http://127.0.0.1:8000/products" class="big no-decoration">Products</a>
            </div>  <!-- Products Card -->
        </div>  <!-- DataBase Cards -->
        </div>   <!-- Main Card in the center -->
    </div>   <!-- Wrapper -->
</div>

@endsection
