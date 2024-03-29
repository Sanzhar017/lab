<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Order Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order ID: {{ $order->id }}</h5>
            <p class="card-text"><strong>Warehouse:</strong> {{ $order->warehouse }}</p>
            <p class="card-text"><strong>City:</strong> {{ $order->city }}</p>
            <p class="card-text"><strong>Card:</strong> {{ $order->card }}</p>
            <p class="card-text"><strong>Quantity:</strong> {{ $order->quantity }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $order->date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
        </div>
    </div>
</div>
</body>
</html>
