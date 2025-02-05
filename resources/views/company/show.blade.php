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
        <a href="{{ route('company.profile') }}">My Profile</a>
    @endif
    <h1>{{ $videogame->name }}</h1>
    <p>{{ $videogame->description }}</p>
    <p>Price: ${{ $videogame->price }}</p>
    
    <!-- Edit Button -->
    <form action="{{ route('company.edit', $videogame->id) }}">
        @csrf
        @method('GET')                    
        <button type="submit">Edit</button>
    </form>
    
    <!-- Delete Form -->
    <form action="{{ route('company.destroy', $videogame->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    
    <br><br>
    <a href="{{ route('company.index') }}">Back to Videogames</a>
</body>
</html>
