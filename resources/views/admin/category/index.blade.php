@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800"> Gestion des Catégories</h1>
        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Nouvelle Catégorie
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow-md rounded overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Nom</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Slug</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Description</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Produits</th>
                    <th class="px-6 py-3 text-left text-gray-700 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $category->slug }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ Str::limit($category->description, 50) }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">
                            {{ $category->products->count() }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.categories.show', $category->id) }}"
                           class="text-blue-600 hover:text-blue-800 mr-3">
                            Voir
                        </a>
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="text-green-600 hover:text-green-800 mr-3">
                            Modifier
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 disabled:opacity-50 disabled:cursor-not-allowed"
                                    onclick="return confirm('Supprimer cette catégorie ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
