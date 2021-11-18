<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>List of Products</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="cards">
                <a href="http://127.0.0.1:8000/products" class="big no-decoration">Products: </a>
                <div>
                    <div class="grid-container">
                        @php $j = 0; @endphp
                        @for($i = 0; $i < 15; $i++)
                            <div class="text-left">
                                @while ( $j < count($products) )
                                    <a href="http://127.0.0.1:8000/products/{{ $products[$j]->id }}" class="no-decoration">
                                        {{$products[$j]->id}} {{ $products[$j]->name }}
                                    </a>
                                    <br>
                                    @php $j++; @endphp
                                    @if( $j%4 == 0 and $j != 0 ) @break @endif
                                @endwhile
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
