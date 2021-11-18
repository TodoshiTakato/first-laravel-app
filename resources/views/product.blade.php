<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Product Info</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
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
</body>
</html>
