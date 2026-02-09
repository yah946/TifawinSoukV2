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
    </div>@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ $category->name }}</h1>
        <div class="space-x-2">
            <a href="{{ route('admin.categories.edit', $category->id) }}" 
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Modifier
            </a>
            <a href="{{ route('admin.categories.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Retour
            </a>
        </div>
    </div>
    
    <div class="bg-white shadow-md rounded p-6 mb-6">
        <div class="space-y-3">
            <p class="text-gray-700">
                <strong>Slug:</strong> {{ $category->slug }}
            </p>
            <p class="text-gray-700">
                <strong>Description:</strong> {{ $category->description ?? 'Aucune description' }}
            </p>
            <p class="text-gray-700">
                <strong>Nombre de produits:</strong> 
                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">
                    {{ $category->products->count() }}
                </span>
            </p>
            <p class="text-gray-700">
                <strong>Créée le:</strong> {{ $category->created_at->format('d/m/Y') }}
            </p>
        </div>
    </div>

    <h3 class="text-xl font-semibold text-gray-800 mb-4">Produits dans cette catégorie</h3>
    
    @if($category->products->count() > 0)
    <div class="bg-white shadow-md rounded overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Nom</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Référence</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Prix</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Stock</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($category->products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $product->reference }}</td>
                    <td class="px-6 py-4 font-semibold">{{ $product->price }} DH</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.products.show', $product->id) }}" 
                           class="text-blue-600 hover:text-blue-800 mr-3">
                            Voir
                        </a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" 
                           class="text-green-600 hover:text-green-800">
                            Modifier
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="bg-gray-50 border border-gray-200 rounded p-6 text-center">
        <p class="text-gray-600">Aucun produit dans cette catégorie.</p>
    </div>
    @endif
</div>
@endsection

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