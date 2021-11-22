<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('layout.header')
    </head>

    <body>
        <div class="wrapper">
            <div class="nav-bar">
                @include('layout.nav-bar')
            </div>
            <div class="content">

                @section('content')
                    This is the master content.
                @show
            </div>
            <div class="footer">
                @include('layout.footer')
            </div>
        </div>
    </body>

</html>

