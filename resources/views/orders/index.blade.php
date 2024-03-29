<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Orders</h2>
    <a href="{{ route('orders.export') }}" class="btn btn-primary">Export Orders</a>

    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>
    @if ($orders->count() > 0)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Warehouse</th>
                <th>City</th>
                <th>Card</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->warehouse }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->card }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->status }}</td>
                    <td>

                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-success">Show</a> <!-- Добавляем кнопку "Show" -->
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links('pagination::bootstrap-4') }}
    @else
        <p>No orders found.</p>
    @endif
    @if (Auth::check())
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    @endif

</div>
</body>
</html>
