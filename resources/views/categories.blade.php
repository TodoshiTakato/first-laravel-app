<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of Categories</title>
</head>
<body>

    <ul>
        @foreach($categories as $category)
            <li>
                <a href="http://127.0.0.1:8000/categories/{{ $category->id }}"> {{ $category->name }} </a>
            </li>
        @endforeach
    </ul>

</body>
</html>
