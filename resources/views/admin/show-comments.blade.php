<!-- resources/views/admin/show-comments.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments List</title>
</head>
<body>
    <h1>Comments List</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($comments as $comment)
            <li>
                <p>{{ $comment->content }}</p>
                <form action="{{ route('admin.destroy_comment', $comment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
