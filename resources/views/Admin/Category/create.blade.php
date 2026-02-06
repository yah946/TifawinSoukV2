@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Créer une Catégorie</h1>
    
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        
        <div class="form">
            <label>Nom </label>
            <input type="text" name="name" class="form" value="{{ old('name') }}" required>
            @error('name')
                <small class="text">{{ $message }}</small>
            @enderror
        </div>

        <div class="group">
            <label>Slug </label>
            <input type="text" name="slug" class="form" value="{{ old('slug') }}" required>
            @error('slug')
                <small class="text">{{ $message }}</small>
            @enderror
        </div>

        <div class="group">
            <label>Description</label>
            <textarea name="description" class="form" rows="3">{{ old('description') }}</textarea>
            @error('description')
                <small class="text">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn one">Créer</button>
        <a href="{{ route('admin.categories.index') }}" class="btn two">Annuler</a>
    </form>
</div>
@endsection