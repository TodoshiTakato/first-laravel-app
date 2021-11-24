@extends('layout.base')

@section('content')

        <div class="flex-column1" style="height: 100%">
            <div class="text-center1" style="padding: 10px; border: 2px solid black;">
                HEADER/TITLE SECTION
            </div>
            <div class="grid-container" style="flex-grow: 1; grid-template-columns: auto auto; grid-gap: 1px; padding: 1px; margin: 10px 0;">
                @php $x=0; @endphp
                    @for ($i = 0; $i < count($categories); $i++)
                        @if($categories[$i]->parent_id == null)

                            <div style="display: flex; align-items: center; justify-content: center">
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
                                    </ul>
                                </div>
                            </div>

                    @endif
                    @endfor
            </div>

            <div class="text-center1" style="padding: 10px; border: 2px solid black;">
                FOOTER SECTION
            </div>
        </div>

@endsection
