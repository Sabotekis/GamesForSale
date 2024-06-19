<!-- resources/views/admin/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
</body>
</html>
