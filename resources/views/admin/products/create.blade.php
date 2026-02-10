@extends('layouts.admin')

@section('title', 'Ajouter un produit')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un nouveau produit</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nom du produit <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('name') border-red-500 @enderror"
                       placeholder="Entrez le nom du produit">
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea name="description" id="description"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('description') border-red-500 @enderror"
                          placeholder="Entrez la description">{{ old('description') }}</textarea>
                @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="px-6 py-2 bg-orange-400 hover:bg-orange-500 cursor-pointer text-white font-medium rounded-lg transition duration-200"
                       for="image">Ajouter des photos</label>
                <input id="image" type="file" accept="image/*" name="images[]" multiple hidden>

                @error('images')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Catégorie <span class="text-red-500">*</span>
                </label>
                <select name="category_id" id="category_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('category_id') border-red-500 @enderror">
                    <option value="" disabled selected>Sélectionner une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">
                    Stock <span class="text-red-500">*</span>
                </label>
                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('stock') border-red-500 @enderror"
                       placeholder="Entrez le stock disponible">
                @error('stock')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                    Prix <span class="text-red-500">*</span>
                </label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required
                       class="w-full px-4 py-2 border border-gray-00 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('price') border-red-500 @enderror"
                       placeholder="Entrez le prix">
                @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="reference" class="block text-sm font-medium text-gray-700 mb-2">
                    Référence
                </label>
                <input type="text" name="reference" id="reference" value="{{ old('reference') }}" disabled
                       class="cursor-not-allowed w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('reference') border-red-500 @enderror"
                       placeholder="la référence">
                @error('reference')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="supplier_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Fournisseur <span class="text-red-500">*</span>
                </label>
                <select name="supplier_id" id="supplier_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('supplier_id') border-red-500 @enderror">
                    <option value="">Sélectionner un fournisseur</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.products.index') }}"
                   class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition duration-200">
                    Annuler
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-orange-400 hover:bg-orange-500 cursor-pointer text-white font-medium rounded-lg transition duration-200">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
@endsection
