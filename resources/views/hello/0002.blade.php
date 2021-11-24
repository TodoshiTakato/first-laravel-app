@extends('layout.base')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="text-center1">
            <h1>Hello, World!</h1>

            @if($name)
                <h1>Your name is {{ $name }}!</h1>
            @endif

            <br><br>

            <hr>
            <a href='/'>Return to the main page</a>
        </div>
    </div>
@endsection
