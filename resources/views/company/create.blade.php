
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Videogame</title>
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
    <h1>Create New Videogame</h1>
    <form action="{{ route('company.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price">
        </div>
        <button type="submit">Create</button>
    </form>
    <a href="{{ route('company.index') }}">Back to Videogames</a>
</body>
</html>
