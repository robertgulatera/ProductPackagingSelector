<!DOCTYPE html>
<html>
<head>
    <title>Product Packaging Selector</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>Enter Product Details</h2>

    <!-- Show success message if product is added -->
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <!-- Product Input Form -->
    <form method="POST" action="/products">
        @csrf
        <label>Product Name:</label><br>
        <input type="text" name="name" required><br>

        <label>Length (cm):</label><br>
        <input type="number" name="length" required><br>

        <label>Width (cm):</label><br>
        <input type="number" name="width" required><br>

        <label>Height (cm):</label><br>
        <input type="number" name="height" required><br>

        <label>Weight (kg):</label><br>
        <input type="number" name="weight" required><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br>

        <button type="submit">Add Product</button>
    </form>

    <h3>Products List</h3>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} ({{ $product->quantity }} units)</li>
        @endforeach
    </ul>
</body>
</html>