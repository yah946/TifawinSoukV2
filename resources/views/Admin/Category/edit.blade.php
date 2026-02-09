@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier la Catégorie</h1>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="bg-white shadow-md rounded p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nom *</label>
                <input type="text"
                       name="name"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                       value="{{ old('name', $category->name) }}"
                       required>
                @error('name')
                    <small class="text-red-600 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Slug *</label>
                <input type="text"
                       name="slug"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                       value="{{ old('slug', $category->slug) }}"
                       required>
                @error('slug')
                    <small class="text-red-600 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description"
                          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                          rows="3">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <small class="text-red-600 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <div class="space-x-2">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Mettre à jour
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700 inline-block">
                        Annuler
                    </a>
                </div>

                <button type="button"
                        class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700"
                        onclick="if(confirm('Supprimer cette catégorie ?')) document.getElementById('delete-form').submit()">
                    Supprimer
                </button>
            </div>
        </form>

        <form id="delete-form" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>
@endsection
