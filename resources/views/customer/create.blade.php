<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write a Comment</title>
</head>
<body>
    <h1>Write a Comment</h1>
    <form action="{{ route('customer.store_comment', $videogameId) }}" method="POST">
        @csrf
        <textarea name="comment" placeholder="Write your comment here..."></textarea>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('customer.show', $videogameId) }}">Back to Game</a>
</body>
</html>
