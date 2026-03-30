<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>Inventory</h2>
        <nav>
            <a href="/categories">Category</a>
            <a href="/products">Products</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="page-header">
            <a href="/categories" class="btn-back">← Back</a>
            <h1>Edit Category</h1>
        </div>

        <div class="card form-card">
            <form action="/categories/{{ $category->id }}" method="POST" class="category-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input 
                        type="text" 
                        id="category_name"
                        name="category_name" 
                        placeholder="e.g., Electronics, Clothing, Food" 
                        value="{{ old('category_name', $category->category_name) }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Update Category</button>
                    <a href="/categories" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
