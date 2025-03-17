<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit product</title>
</head>
<body>
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="w-full p-2 border rounded">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category_id" id="category_id" class="w-full p-2 border rounded">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
            <input type="text" name="size" id="size" value="{{ old('size', $product->size) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input type="text" name="color" id="color" value="{{ old('color', $product->color) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="area_of_use" class="block text-sm font-medium text-gray-700">Area of Use</label>
            <input type="text" name="area_of_use" id="area_of_use" value="{{ old('area_of_use', $product->area_of_use) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" name="image" id="image" class="w-full p-2 border rounded">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-2 w-32 h-32 object-cover rounded">
            @endif
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update Product</button>
        </div>
    </form>
</div>
</body>
</html>