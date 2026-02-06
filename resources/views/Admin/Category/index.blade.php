@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Gestion des Catégories</h1>
    
    <a href="{{ route('admin.categories.create') }}" class="btn-one mb-3">+ Nouvelle Catégorie</a>

    @if(session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Produits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ Str::limit($category->description, 50) }}</td>
                <td>{{ $category->products->count() }}</td>
                <td>
                    <a href="{{ route('admin.categories.show', $category->id) }}" class="btn-sm btn-info">Voir</a>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-sm btn-one">Modifier</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn-danger" 
                                onclick="return confirm('Supprimer cette catégorie ?')"
                                @if($category->products->count() > 0) disabled @endif>
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection