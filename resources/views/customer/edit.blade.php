<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
</head>
<body>
    <h1>Edit Comment</h1>
    <form action="{{ route('customer.update_comment', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="comment">{{ $comment->comment }}</textarea>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('customer.show', $comment->videogame_id) }}">Back to Game</a>
</body>
</html>
