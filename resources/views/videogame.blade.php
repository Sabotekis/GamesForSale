<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videogame</title>
</head>
<body>
    @auth
        <p>Welcome, {{ Auth::user()->name }}! 
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <p>
            <a href="{{ route('login') }}">Login</a> | 
            <a href="{{ route('register') }}">Register</a>
        </p>
    @endauth

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sed praesentium, facere excepturi quibusdam veniam vel repudiandae dolores placeat fuga, quae ex accusantium repellat quasi modi laudantium sunt! Nesciunt, beatae!</p>
</body>
</html>
