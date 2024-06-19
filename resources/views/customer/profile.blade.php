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
    <a href="{{ route('customer.index') }}">Back to Videogames</a>
    <h2>Purchased Videogames</h2>
    <ul>
        @foreach ($purchases as $purchase)
            <li>
                <a href="{{ route('customer.show', $purchase->videogame->id) }}">{{ $purchase->videogame->name }}</a>
                <p>{{ $purchase->videogame->description }}</p>
                <p>Price: ${{ $purchase->videogame->price }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
