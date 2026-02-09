@extends('layouts.admin')

@section('title', 'La liste des fournisseurs archivées')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Liste des fournisseurs archivées</h1>
        <a href="{{ route('admin.suppliers.index') }}"
           class="inline-flex items-center px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Retour à la liste
        </a>
    </div>

    <!-- Tableau des fournisseurs -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivé
                        le
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($suppliers as $supplier)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-500">{{ $supplier->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $supplier->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $supplier->deleted_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <form action="{{ route('admin.suppliers.restore', $supplier) }}" method="POST"
                                      class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            class="text-green-700 hover:text-green-900 transition-colors duration-150"
                                            onclick="return confirm('Êtes-vous sûr de vouloir restaurer ce fournisseur ?')">
                                        Restaurer
                                    </button>
                                </form>
                                <form action="{{ route('admin.suppliers.force-destroy', $supplier) }}" method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-900 transition-colors duration-150"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer définitivement ce fournisseur ?')">
                                        Supprimer définitivement
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            Aucun fournisseur trouvé.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($suppliers->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        {{ $suppliers->links() }}
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Affichage de
                                <span class="font-medium">{{ $suppliers->firstItem() }}</span>
                                à
                                <span class="font-medium">{{ $suppliers->lastItem() }}</span>
                                sur
                                <span class="font-medium">{{ $suppliers->total() }}</span>
                                résultats
                            </p>
                        </div>
                        <div>
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
