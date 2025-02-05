
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 20px;
    padding: 0;
}

h1, h2 {
    text-align: center;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 20px;
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
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background-color: #45a049;
}

form {
    display: inline;
}

.form-buttons {
    margin-left: 10px;
}

.success-message {
    background-color: #dff0d8;
    color: #3c763d;
    border: 1px solid #d6e9c6;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <h2>Customers</h2>
    <ul>
        @foreach ($customers as $customer)
            <li>
                {{ $customer->name }}
                @if ($customer->blocked)
                    <form action="{{ route('admin.block', $customer->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Unblock</button>
                    </form>
                @else
                    <form action="{{ route('admin.block', $customer->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Block</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Companies</h2>
    <ul>
        @foreach ($companies as $company)
            <li>
                {{ $company->name }}
                @if ($company->blocked)
                    <form action="{{ route('admin.block', $company->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Unblock</button>
                    </form>
                @else
                    <form action="{{ route('admin.block', $company->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Block</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
    <a href="{{ route('home') }}">Back to Videogames</a>
</body>
</html>
