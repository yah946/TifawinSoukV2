@extends('layout.admin')

@section('title', 'Ajouter un fournisseur')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un nouveau fournisseur</h2>

        <form action="{{ route('admin.suppliers.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nom du fournisseur *
                </label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('name') border-red-500 @enderror"
                       placeholder="Entrez le nom du fournisseur">
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-2">
                    Ville *
                </label>
                <input type="text"
                       id="city"
                       name="city"
                       value="{{ old('city') }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('city') border-red-500 @enderror"
                       placeholder="Entrez la ville du fournisseur">
                @error('city')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email *
                </label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('email') border-red-500 @enderror"
                       placeholder="Entrez l'email du fournisseur">
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">
                    Numéro de téléphone *
                </label>
                <input type="tel"
                       id="phone_number"
                       name="phone_number"
                       value="{{ old('phone_number') }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('phone_number') border-red-500 @enderror"
                       placeholder="Entrez le numéro de téléphone">
                @error('phone_number')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.suppliers.index') }}"
                   class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition duration-200">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7v12q0 .825-.587 1.413T19 21H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h12zm-9 11q1.25 0 2.125-.875T15 15t-.875-2.125T12 12t-2.125.875T9 15t.875 2.125T12 18m-6-8h9V6H6z"/></svg>
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
@endsection
