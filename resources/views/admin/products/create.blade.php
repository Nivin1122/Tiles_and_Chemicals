<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
<h1>Add Product</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="stock" placeholder="Stock" required>

        <!-- Category Selection - Properly Structured -->
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <!-- Size Input -->
        <div>
            <label for="size">Size</label>
            <input type="text" name="size" id="size" value="{{ old('size') }}" class="form-input">
        </div>

        <!-- Color Input -->
        <div>
            <label for="color">Color</label>
            <input type="text" name="color" id="color" value="{{ old('color') }}" class="form-input">
        </div>

        <!-- Area of Use Input -->
        <div>
            <label for="area_of_use">Area of Use</label>
            <input type="text" name="area_of_use" id="area_of_use" value="{{ old('area_of_use') }}" class="form-input">
        </div>

        <!-- Image Upload -->
        <input type="file" name="image">

        <button type="submit">Save</button>
    </form>
</body>
</html>
