@extends('layout.base')

@section('content')
    <div style="display: block; height: 100%;">
        <div style="display: flex; flex-direction: column">
        <div style="flex-grow: 1;">

        </div>
        <div class="cards d-flex" style="flex-grow: 5;">

            <div class="flex-center" style="border: solid">
                @php $x=0; @endphp
                @for ($i = 0; $i < count($categories); $i++)
                    @if($categories[$i]->parent_id == null)
                        @if ($x%2 == 0)
                            <div> @endif
                                <div class="cards">
                                    <ul>
                                        <li>
                                            <a href="http://127.0.0.1:8000/categories/{{ $categories[$i]->id }}"> {{ $categories[$i]->name }}: </a>
                                        </li>
                                        <ul>
                                            @for ($j = 0; $j < count($categories); $j++)
                                                @if($categories[$j]->parent_id != null and $categories[$j]->parent_id == $i+1)
                                                    <li>
                                                        <a href="http://127.0.0.1:8000/categories/{{ $categories[$j]->id }}"> {{ $categories[$j]->name }} </a>
                                                    </li>
                                                @endif
                                                @php $x++; @endphp
                                            @endfor
                                        </ul>
                                </div>
                        @if ($x%2 == 0)
                        </div> @endif
                                    </ul>
                    @endif
                @endfor
            </div>
        </div>

        <div class="text-center" style="flex-grow: 1;">
            <h3><a href="http://127.0.0.1:8000/">Назад</a></h3>
        </div>
    </div>
    </div>
@endsection
