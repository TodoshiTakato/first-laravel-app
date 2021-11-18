<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dear User {{ $variable_name_doesn_matter }}!</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            @if($variable_name_doesn_matter)
                <h1>User, your variable is {{ $variable_name_doesn_matter }}!</h1>
            @endif

            <br><br>

            <hr>
            <a href='/'>Return to the main page</a>
        </div>
    </div>
</body>
</html>
