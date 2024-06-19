<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body>
    <h1>My Profile</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <a href="{{ route('company.index') }}">Back to Videogames</a>
    
    <h2>My Videogames</h2>
    <ul>
        @foreach ($videogames as $videogame)
            <li>
                <a href="{{ route('company.show', $videogame->id) }}">{{ $videogame->name }}</a>
                <p>{{ $videogame->description }}</p>
                <p>Price: ${{ $videogame->price }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
