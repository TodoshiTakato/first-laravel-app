@extends('layout.base')

@section('content1')
    <div class="flex-center position-ref full-height">
        <div class="text-center1">
            <div class="cards">
                <div><a href="http://127.0.0.1:8000/products" class="big">Products: </a></div>
                <div>
                    <div class="grid-container1">
                        @for($i = 0; $i < count($categories); $i++)
                            <div>
                                <span class="text-center1 d-block1">
                                    <a href="/categories/{{$categories[$i]->id}}">
                                        {{$categories[$i]->id}}. {{$categories[$i]->name}}:
                                    </a>
                                </span>
                                <hr>
                                @for ($j=0; $j<count($products); $j++)
                                    @if($products[$j]->category_id==$categories[$i]->id)
                                        <div style="display: flex; justify-content: space-between; width: 100%;">
                                            <div class="text-left1">
                                                <a href="http://127.0.0.1:8000/products/{{ $products[$j]->id }}">
                                                    {{$products[$j]->id}}. {{ $products[$j]->name }}&nbsp;
                                                </a>
                                            </div>
                                            <div style="text-align: right">&ensp;&emsp;{{ $products[$j]->price }}</div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        @endfor
                    </div>
                </div>
                <div><a href="http://127.0.0.1:8000/" class="big">Назад</a></div>
            </div>
        </div>
    </div>
@endsection
