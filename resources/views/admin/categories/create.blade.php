<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create category</title>
</head>
<body>
<h2>Add New Category</h2>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        
        <label>Description:</label>
        <textarea name="description"></textarea>
        
        <button type="submit">Save</button>
    </form>
</body>
</html>