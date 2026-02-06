@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    
    <div class="card">
        <div class="card-body">
            <p><strong>Slug:</strong> {{ $category->slug }}</p>
            <p><strong>Description:</strong> {{ $category->description ?? 'Aucune description' }}</p>
            <p><strong>Nombre de produits:</strong> {{ $category->products->count() }}</p>
            <p><strong>Créée le:</strong> {{ $category->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <h3 class="mt-4">Produits dans cette catégorie</h3>
    
    @if($category->products->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Référence</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->reference }}</td>
                <td>{{ $product->price }} DH</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info">Voir</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Aucun produit dans cette catégorie.</p>
    @endif

    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection