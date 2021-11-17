<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello0004 {{ $name }}!</title>
</head>
<body>

    <h1>Hello, World!</h1>

    @if($name)
        <h1>Your name is {{ $name }}!</h1>
    @endif

    <br><br>

    <hr>
    <a href='/'>Return to the main page</a>

</body>
</html>