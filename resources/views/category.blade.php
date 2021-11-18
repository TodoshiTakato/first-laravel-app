<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Category Info</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h3>{{ $category->name }}</h3>
            <ul>
                <li>
                    Сategory_id: {{ $category->id }}
                </li>
                <li>
                    Parent_id: {{ $category->parent_id }}
                </li>
                <li>
                    Сategory_name: {{ $category->name }}
                </li>
                <li>
                    created_at: {{ $category->created_at }}
                </li>
                <li>
                    updated_at: {{ $category->updated_at }}
                </li>
            </ul>
            <h3><a href="http://127.0.0.1:8000/categories" class="no-decoration">Назад</a></h3>
        </div>
    </div>
</body>
</html>
