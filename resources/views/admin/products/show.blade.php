@extends('layouts.admin')

@section('title', 'Détails du produit')

@section('content')
    <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $product->name }}
            </h2>

            <div class="flex gap-3">
                <a href="{{ route('admin.products.edit', $product->id) }}"
                   class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                    Edit
                </a>

                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        {{-- Image --}}
        <div class="mb-6">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="w-full h-72 object-cover rounded-lg">
            @else
                <div class="w-full h-72 bg-gray-200 flex items-center justify-center rounded-lg text-gray-500">
                    No Image Available
                </div>
            @endif
        </div>

        {{-- Infos --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">

            <div>
                <p class="text-sm text-gray-500">Category</p>
                <p class="font-medium">{{ $product->category->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Supplier</p>
                <p class="font-medium">{{ $product->supplier->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Price</p>
                <p class="font-medium">${{ $product->price }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Stock</p>
                <p class="font-medium">{{ $product->stock }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Reference</p>
                <p class="font-medium">{{ $product->reference ?? '—' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Created at</p>
                <p class="font-medium">{{ $product->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        {{-- Description --}}
        <div class="mt-6">
            <p class="text-sm text-gray-500 mb-2">Description</p>
            <p class="text-gray-700 leading-relaxed">
                {{ $product->description ?? 'No description provided.' }}
            </p>
        </div>

        {{-- Back --}}
        <div class="mt-8">
            <a href="{{ route('admin.products.index') }}"
               class="inline-block px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                ← Back to products
            </a>
        </div>
    </div>
@endsection
