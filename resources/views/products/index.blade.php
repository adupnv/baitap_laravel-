<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
<a href="{{ route('products.index') }}" class="btn btn-primary">Danh sách sản phẩm</a>
@foreach($products as $product)
<div class="card" style="width: 18rem;">
    <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <a href="#" class="btn btn-primary">{{ $product->price }}</a>
    </div>
</div>
@endforeach

</body>
</html>

