<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $videogame->name }}</title>
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
    @if (Auth::check())
        <a href="{{ route('customer.profile') }}">My Profile</a>
    @endif
    <h1>{{ $videogame->name }}</h1>
    <p>{{ $videogame->description }}</p>
    <p>Price: ${{ $videogame->price }}</p>
    @if (Auth::check())
        @if ($purchased)
            <p>You have already purchased this game.</p>
            <a href="{{ route('customer.create_comment', $videogame->id) }}">Write a Comment</a>
        @else
            <form action="{{ route('customer.buy', $videogame->id) }}" method="POST">
                @csrf
                <button type="submit">Buy</button>
            </form>
        @endif
    @else
        <p><a href="{{ route('login') }}">Login</a> to buy this game.</p>
    @endif

    <h2>Comments</h2>
    @forelse ($videogame->comments as $comment)
        <div>
            <p>{{ $comment->comment }}</p>
            <p>Posted by: {{ $comment->user->name }}</p>
            @if (Auth::id() === $comment->user_id)
                <form action="{{ route('customer.edit_comment', $comment->id) }}">
                    @csrf
                    @method('GET')                    
                    <button type="submit">Edit</button>
                </form>
                <form action="{{ route('customer.destroy_comment', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        </div>
        <hr>
    @empty
        <p>No comments yet.</p>
    @endforelse
    <a href="{{ route('customer.index') }}">Back to Videogames</a>
</body>
</html>
