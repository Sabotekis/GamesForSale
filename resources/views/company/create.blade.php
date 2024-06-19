<!-- resources/views/company/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Videogame</title>
</head>
<body>
    <h1>Create New Videogame</h1>
    <form action="{{ route('company.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price">
        </div>
        <button type="submit">Create</button>
    </form>
    <a href="{{ route('company.index') }}">Back to Videogames</a>
</body>
</html>
