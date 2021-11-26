@extends('layout.base')

@section('content1')
    <?php error_reporting(E_ALL); ?>
    <div class="grid-container">
        <div></div> {{-- 1 --}}
        <div></div> {{-- 2 --}}
        <div></div> {{-- 3 --}}
        <div></div> {{-- 4 --}}
        <div> {{-- 5 - center --}}
            <h1>Home page</h1>
            <br>
            @foreach($data as $key => $value)
                {{$key}}: {{$value}}<br>
            @endforeach

        </div> {{-- 5 - center --}}
        <div></div> {{-- 6 --}}
        <div></div> {{-- 7 --}}
        <div></div> {{-- 8 --}}
        <div></div> {{-- 9 --}}
    </div>

@endsection
