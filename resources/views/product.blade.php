<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <form action="/submit" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>