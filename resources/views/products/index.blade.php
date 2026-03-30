<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>  
    <div class="sidebar">
        <h2>Inventory</h2>
        <nav>
<a href="/categories">Category</a>
<a href="/products"><strong>Products</strong></a>
        </nav>
    </div>
    <div class="main-content">
        <h1>Products</h1>
        <form action="/products" method="POST" class="product-form">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="e.g. MacBook Pro">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" placeholder="0.00">
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
<select id="category_id" name="category_id" required>
        <option value="" disabled selected>Select a category</option>
        
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">
                {{ $cat->category_name }}
            </option>
        @endforeach
</select>
            </div>

            <button type="submit" class="btn-primary">Save Product</button>

        </form>
        <hr>
        <div class="card">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                    <tr>
                        <td>#{{ $item->id }}</td>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td>₱{{number_format($item->price,2)  }}</td>
                        <td><span class="badge">{{ ucfirst($item->category->category_name ?? 'N/A') }}</span></td>
                        <td style="text-align:right">
                            <a href="/products/{{ $item->id }}/edit" style="text-decoration: none;">🖋️Edit</a>
                            <form action="/products/{{ $item->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Delete this item?')">🗑️Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>