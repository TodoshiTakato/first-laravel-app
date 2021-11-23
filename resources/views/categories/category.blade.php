@extends('layout.base')

@section('content')
    <div class="flex-center position-ref full-height">
            @if($category->parent_id == null)
        <div>
                <h3>{{$category->name}}: </h3>
                <ul>
                    @php $counter = 1; @endphp
                    @for($i = 0; $i < count($categories); $i++)
                        @if($category->id == $categories[$i]->parent_id)
                            <li>
                                <a href="http://127.0.0.1:8000/categories/{{ $categories[$i]->id }}">
                                {{ $counter }} {{$categories[$i]->name}}</a>
                                <br>
                            </li>
                            @php $counter=$counter; $counter++; @endphp
                        @endif
                    @endfor
                </ul>
                <h3><a href="http://127.0.0.1:8000/categories">Назад</a></h3>
            @else
        <div class="text-center">
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
                <h3><a href="http://127.0.0.1:8000/categories/{{ $category->parent_id }}">Назад</a></h3>
            @endif
        </div>
    </div>
@endsection
