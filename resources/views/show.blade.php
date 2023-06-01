<style>
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        width: 300px;
        float: left;
    }

    .card img {
        width: 100%;
    }
</style>

<body>
    <h1>Products</h1>

    @foreach($products as $product)
        <div class="card">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>{{ $product->price }}</p>
        </div>
    @endforeach
</body>