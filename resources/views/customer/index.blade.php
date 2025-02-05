<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Videogames</title>
    <style>
body {
    font-family: Arial, sans-serif;
}

h1, h2 {
    text-align: center;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 10px;
    width: 200px;
    text-align: center;
}

a {
    text-decoration: none;
    color: black;
}

a:hover {
    text-decoration: underline;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
}

input[type="text"], textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

form {
    margin: 20px;
}

#profile, #search, #games {
    display: inline-block;
    margin: 10px;
    vertical-align: top;
}

#profile {
    float: right;
}

#search {
    float: left;
}

#games {
    clear: both;
    text-align: center;
}

#comments {
    text-align: left;
    margin: 20px;
}

.comment {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
}

.comment form {
    display: inline-block;
}

.comment button {
    margin-left: 10px;
}
    </style>
</head>
<body>
    <h1>GamesForSale</h1>
    @if (Auth::check())
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a href="{{ route('customer.profile') }}">My Profile</a>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endif

    <!-- Search form -->
    <form action="{{ route('customer.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search videogames...">
        <button type="submit">Search</button>
    </form>

    @if(isset($searchQuery))
        <h2>Search results for: {{ $searchQuery }}</h2>
    @endif
    <!-- List of videogames -->
    <ul>
        @foreach ($videogames as $videogame)
            <li>
                <a href="{{ route('customer.show', $videogame->id) }}">{{ $videogame->name }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
