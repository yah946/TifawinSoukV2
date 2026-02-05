<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Create New Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="category_id" >Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="supplier_id" >Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" >Product Name</label>
            <input type="text" name="name"  class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" >Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="stock" >Stock</label>
            <input type="number" name="stock" id="stock" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label for="price" >Price</label>
            <input type="number" name="price"  required>
        </div>

        <div class="mb-3">
            <label for="reference" >Reference</label>
            <input type="text" name="reference" id="reference" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
        <a href="{{ route('products.index') }}" >Cancel</a>
    </form>
</div>
</body>
</html>
