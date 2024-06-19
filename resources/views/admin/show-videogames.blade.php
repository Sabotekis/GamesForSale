<!-- resources/views/admin/show-videogames.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videogames List</title>
</head>
<body>
    <h1>Videogames List</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($videogames as $videogame)
            <li>
                <strong>{{ $videogame->name }}</strong>
                <p>{{ $videogame->description }}</p>
                <p>Price: ${{ $videogame->price }}</p>
                <form action="{{ route('admin.destroy_videogame', $videogame->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
