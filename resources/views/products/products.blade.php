@extends('layout.base')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="text-center">
            <div class="cards">
                <div><a href="http://127.0.0.1:8000/products" class="big no-decoration">Products: </a></div>
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
                <div><h3><a href="http://127.0.0.1:8000/" class="no-decoration">Назад</a></h3></div>
            </div>
        </div>
    </div>
@endsection
