<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
<h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $category->name }}" required>
        
        <label>Description:</label>
        <textarea name="description">{{ $category->description }}</textarea>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>