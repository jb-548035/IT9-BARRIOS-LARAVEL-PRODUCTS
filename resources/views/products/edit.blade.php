<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>Inventory</h2>
        <nav>
            <a href="/categories">Category</a>
            <a href="/products" class="active">Products</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="page-header">
            <a href="/products" class="btn-back">← Back</a>

        </div>

        <div class="card form-card">
            <form action="/products/{{ $product->id }}" method="POST" class="category-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                                
            <h1>Edit Product</h1>
                    <label for="name">Product Name</label>
                    <input 
                        type="text" 
                        id="name"
                        name="name" 
                        placeholder="e.g., MacBook Pro" 
                        value="{{ old('name', $product->name) }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input 
                        type="number" 
                        id="price"
                        name="price" 
                        placeholder="0.00" 
                        value="{{ old('price', $product->price) }}"
                        step="0.01"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select 
                        id="category_id" 
                        name="category_id" 
                        required
                    >
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Update Product</button>
                    <a href="/products" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>