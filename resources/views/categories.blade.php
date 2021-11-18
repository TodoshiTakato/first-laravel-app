<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>List of Categories</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
    <div class="flex-center position-ref full-height">
        @php $x=0; @endphp
        @for ($i = 0; $i < count($categories); $i++)
            @if($categories[$i]->parent_id == null)
                @if ($x%2 == 0) <div> @endif
                <div class="cards">
                    <ul>
                    <li>
                        <a href="http://127.0.0.1:8000/categories/{{ $categories[$i]->id }}"
                           class="no-decoration"> {{ $categories[$i]->name }}: </a>
                    </li>
                    @for ($j = 0; $j < count($categories); $j++)
                        @if($categories[$j]->parent_id != null and $categories[$j]->parent_id == $i+1)
                            <ul>
                                <li>
                                    <a href="http://127.0.0.1:8000/categories/{{ $categories[$j]->id }}"
                                       class="no-decoration"> {{ $categories[$j]->name }} </a>
                                </li>
                            </ul>
                        @endif
                        @php $x++; @endphp
                    @endfor
                </div>
                <br>
                @if ($x%2 == 0) </div> @endif
                </ul>
            @endif
        @endfor
        <h3><a href="http://127.0.0.1:8000/" class="no-decoration">Назад</a></h3>
    </div>
</body>
</html>
