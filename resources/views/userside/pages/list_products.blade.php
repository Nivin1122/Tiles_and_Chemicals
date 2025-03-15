<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container { max-width: 1000px; margin: auto; padding: 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .product-card { border: 1px solid #ddd; padding: 15px; border-radius: 8px; text-align: center; }
        .product-card img { max-width: 100%; height: auto; border-radius: 5px; }
        .pagination { justify-content: center; margin-top: 20px; }
    </style>
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
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>
</html>