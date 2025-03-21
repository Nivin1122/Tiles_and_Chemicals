<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
</head>
<body>
<h1>Products</h1>
    <a href="{{ route('admin.products.create') }}">Add Product</a>
    <table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Area of Use</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->area_of_use }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>