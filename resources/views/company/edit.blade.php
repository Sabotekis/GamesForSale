<!-- resources/views/company/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Videogame: {{ $videogame->name }}</title>
</head>
<body>
    <h1>Edit Videogame: {{ $videogame->name }}</h1>
    <form action="{{ route('company.update', $videogame->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $videogame->name }}">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ $videogame->description }}</textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="{{ $videogame->price }}">
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('company.show', $videogame->id) }}">Back to Videogame</a>
</body>
</html>
