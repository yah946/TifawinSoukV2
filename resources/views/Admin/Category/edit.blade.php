@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifier la Catégorie</h1>
    
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form">
            <label>Nom </label>
            <input type="text" name="name" class="control" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <small class="text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form">
            <label>Slug </label>
            <input type="text" name="slug" class="control" value="{{ old('slug', $category->slug) }}" required>
            @error('slug')
                <small class="text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form">
            <label>Description</label>
            <textarea name="description" class="control" rows="3">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <small class="text">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-one">Mettre à jour</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-two">Annuler</a>
        
        <button type="button" class="btn btn-danger float-right" 
                onclick="if(confirm('Supprimer cette catégorie ?')) document.getElementById('delete-form').submit()">
            Supprimer
        </button>
    </form>

    <form id="delete-form" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection

