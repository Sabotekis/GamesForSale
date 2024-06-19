<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $videogame->name }}</title>
</head>
<body>
    @if (Auth::check())
        <a href="{{ route('company.profile') }}">My Profile</a>
    @endif
    <h1>{{ $videogame->name }}</h1>
    <p>{{ $videogame->description }}</p>
    <p>Price: ${{ $videogame->price }}</p>
    
    <!-- Edit Button -->
    <a href="{{ route('company.edit', $videogame->id) }}">Edit</a>
    
    <!-- Delete Form -->
    <form action="{{ route('company.destroy', $videogame->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    
    <br><br>
    <a href="{{ route('company.index') }}">Back to Videogames</a>
</body>
</html>
