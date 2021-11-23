@extends('layout.base')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="text-center">
            <ul class="nav-bar">
                <li class="nav-item"><a href="http://127.0.0.1:8000/">Home</a></li>
                <li class="nav-item"><a href="#news">News</a></li>
                <li class="nav-item"><a href="#contact">Contact</a></li>
                <li class="nav-item"><a href="#about">About</a></li>
            </ul>
            @foreach($parent_categories as $parent_category)
                {{$parent_category->name}}<br>
            @endforeach
        </div>
    </div>
@endsection
