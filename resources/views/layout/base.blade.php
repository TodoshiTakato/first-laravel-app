<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('layout.header')
    </head>

    <body>
        <div class="wrapper">
            <div class="nav-bar">
                @include('layout.nav-bar')
            </div>
            <div class="container1">
                <div class="column sidebar">
                    <ul><li>The Flight</li><li>The City</li><li>The Island</li><li>The Food</li></ul>
                </div>
                <div class="column content">
                    @section('content1')
                        This is the master content.
                    @show
                </div>
                <div class="column sidebar">
                    <ul><li>The Flight</li><li>The City</li><li>The Island</li><li>The Food</li></ul>
                </div>
            </div>
            <div class="footer">
                @include('layout.footer')
            </div>
        </div>
    </body>

</html>

