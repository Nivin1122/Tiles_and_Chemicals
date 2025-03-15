<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list products</title>
</head>
<body>
<div class="container">
        <h2>All Products</h2>
        <div class="grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $product->image) }}" width="100">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price: </strong> ₹{{ $product->price }}</p>
                    <a href="#">Add to Cart</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>