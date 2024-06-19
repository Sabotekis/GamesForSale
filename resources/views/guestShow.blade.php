<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $videogame->name }}</title>
</head>
<body>
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
                <a href="{{ route('customer.edit_comment', $comment->id) }}">Edit</a>
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
    <a href="{{ route('home') }}">Back to Videogames</a>
</body>
</html>
