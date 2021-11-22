@extends('layout.base')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="text-center">
            <h3>{{ $product->name }}</h3>
            <ul>
                <li>
                    Product_id: {{ $product->id }}
                </li>
                <li>
                    Product_name: {{ $product->name }}
                </li>
                <li>
                    Product_description: {{ $product->description }}
                </li>
                <li>
                    Product_price: {{ $product->price }}
                </li>
                <li>
                    Product_status: {{ $product->status }}
                </li>
                <li>
                    Category_id: {{ $product->category_id }}
                </li>
                <li>
                    updated_at: {{ $product->updated_at }}
                </li>
                <li>
                    updated_at: {{ $product->updated_at }}
                </li>
            </ul>
            <h3><a href="http://127.0.0.1:8000/products" class="no-decoration">Назад</a></h3>
        </div>
    </div>
@endsection
