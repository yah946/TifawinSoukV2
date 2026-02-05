<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>

<h1>List Of Products</h1>

<a href="{{ route('products.create') }}">create Product</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>stock</th>
            <th>reference</th>
            <th>category</th>
            <th>supplier</th>
            <th>created at</th>
            <th>options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->reference }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->supplier->name }}</td>
                <td>{{ $product->created_at }}</td>
               <td>
                    <a href="{{ route('products.show', $product->id) }}">view</a> |
                    <a href="{{ route('products.edit', $product->id) }}">edit</a> |
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
