<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>Inventory</h2>
        <nav>
            <a href="/categories" class="active">Category</a>
            <a href="/products">Products</a>
        </nav>
    </div>

    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Categories Management</h1>
        </div>

        <!-- Add Category Form -->
        <div class="card form-card">
            <h2 style="margin-top: 0; margin-bottom: 24px; font-size: 1.25rem;">Add New Category</h2>
            <form action="/categories" method="POST" class="category-form">
                @csrf

                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input 
                        type="text" 
                        id="category_name"
                        name="category_name" 
                        placeholder="e.g., Electronics, Clothing, Food" 
                        value="{{ old('category_name') }}"
                        required
                    >
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Create Category</button>
                   
                </div>
            </form>
        </div>

        <!-- Categories Table -->
        <div class="card">
            @if($categories->count())
                <div class="table-wrapper">
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Created Date</th>
                                <th class="action-col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $cat)
                            <tr>
                                <td class="id-cell">#{{ $cat->id }}</td>
                                <td>{{ $cat->category_name }}</td>
                                <td>{{ $cat->created_at->format('M d, Y') }}</td>
                                <td class="action-col">
                                    <div class="action-buttons">
                                        <a href="/categories/{{ $cat->id }}/edit" class="btn-edit">Edit</a>
                                        <form action="/categories/{{ $cat->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?');">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <p>No categories yet. Create one using the form above!</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>

