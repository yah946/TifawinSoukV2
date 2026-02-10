@extends('layouts.admin')

@section('title', 'Tifawin')

@section('content')

    <h1 class="text-2xl font-bold mb-6">List of Products</h1>
    <div class="w-full flex justify-end gap-4">
         <a href="{{ route('admin.products.trashed') }}"
       class="inline-block mb-4 px-4 py-2  text-white rounded-lg bg-gray-600 hover:bg-gray-700 transition">
       <i class="fa-regular fa-folder-open"></i>  Accéder aux Archives    
    </a>
    <a href="{{ route('admin.products.create') }}"
       class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        <i class="fa-solid fa-plus"></i>  Create Product
    </a>
   
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">

                @if($product->cover)
                    <img src="{{ asset('storage/'.$product->cover->path) }}" alt="{{ $product->name }}"
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif

                <div class="p-4">
                    <a href="{{ route('admin.products.show', $product->id) }}"
                       class="block text-lg font-semibold text-blue-600 hover:underline mb-2">
                        {{ $product->name }}
                    </a>

                    <p class="text-gray-700 text-sm mb-4">
                        {{ Str::limit($product->description, 60) }}
                    </p>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition text-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
                                Delete
                            </button>
                        </form>
                    </div>

                    <div class="mt-3 text-gray-600 text-sm">
                        <p>Price: ${{ $product->price }}</p>
                        <p>Stock: {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
