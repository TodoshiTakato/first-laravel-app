@extends('layout.base')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="text-center">
            @if($variable_name_doesn_matter)
                <h1>User, your variable is "{{ $variable_name_doesn_matter }}"!</h1>
            @endif

            <br><br>

            <hr>
            <a href='/'>Return to the main page</a>
        </div>
    </div>
@endsection
