<!-- resources/views/guest.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>List of Videogames</h1>
    @if (Auth::check())
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endif

    <!-- Search form -->
    <form action="{{ route('guest.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search videogames..." value="{{ old('query', $searchQuery ?? '') }}">
        <button type="submit">Search</button>
    </form>

    @if(isset($searchQuery))
        <h2>Search results for: {{ $searchQuery }}</h2>
    @endif

    <ul>
        @foreach ($videogames as $videogame)
            <li>
                <a href="{{ route('guest.show', ['videogameId' => $videogame->id]) }}">{{ $videogame->name }}</a>
                <p>{{ $videogame->description }}</p>
                <p>Price: ${{ $videogame->price }}</p>
            </li>
        @endforeach
    </ul>
   
</body>
</html>
