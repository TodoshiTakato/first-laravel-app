@extends('layout.base')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="text-center">
            <div class="cards">
                <div><a href="http://127.0.0.1:8000/products" class="big">Products: </a></div>
                <div>
                    <div class="grid-container">
                        @php $j = 0; @endphp
                        @for($i = 0; $i < $subcategory_counter; $i++)
                            <div>
                                <span class="text-center d-block"><a href="/categories/{{$category_ids[$i]}}">{{$category_names[$i]}}: </a></span>
                                <hr>
                                @while ( $j < count($products) )
                                    <div style="display: flex; justify-content: space-between; width: 100%;">
                                        <div class="text-left">
                                            <a href="http://127.0.0.1:8000/products/{{ $products[$j]->id }}">
                                                {{$products[$j]->id}}. {{ $products[$j]->name }}&nbsp;
                                            </a>
                                        </div>
                                        <div style="text-align: right">&ensp;&emsp;{{ $products[$j]->price }}</div>
                                    </div>
                                    @php $j++; @endphp
                                    @if( $j%4 == 0 and $j != 0 ) @break @endif
                                @endwhile
                            </div>
                        @endfor
                    </div>
                </div>
                <div><h3><a href="http://127.0.0.1:8000/"> Назад </a></h3></div>
            </div>
        </div>
    </div>
@endsection
