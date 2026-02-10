@extends('layouts.admin')

@section('title', 'Détail de la Commande #' . $order->tracking_number)

@section('content')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Commande #{{ $order->tracking_number }}</h1>
                <p class="mt-1 text-sm text-gray-500">Détails complets de la commande</p>
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <a href="{{ route('admin.orders.index') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                    Retour aux commandes
                </a>
                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Order Status Banner -->
    <div class="mb-6">
        @php
            $statusColors = [
                'pending' => 'bg-yellow-100 text-yellow-800',
                'shipped' => 'bg-blue-100 text-blue-800',
                'delivered' => 'bg-green-100 text-green-800',
                'canceled' => 'bg-red-100 text-red-800'
            ];
            $statusLabels = [
                'pending' => 'En attente',
                'shipped' => 'Expédié',
                'delivered' => 'Livré',
                'canceled' => 'Annulé'
            ];
        @endphp
        <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Statut de la commande</h3>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                        {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                    </span>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Créée le</p>
                <p class="text-lg font-semibold text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Customer Information -->
        <div class="lg:col-span-1">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Informations Client</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    @if($order->user)
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Nom complet</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $order->user->name }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Email</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $order->user->email }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Téléphone</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $order->user->phone_number ?? 'Non renseigné' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">ID Client</label>
                                <p class="mt-1 text-sm text-gray-900">#{{ $order->user->id }}</p>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Client supprimé</h3>
                            <p class="mt-1 text-sm text-gray-500">Les informations du client ne sont plus
                                disponibles</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Résumé de la Commande</h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Numéro de suivi</label>
                            <p class="mt-1 text-sm font-mono text-gray-900 bg-gray-50 px-2 py-1 rounded">{{ $order->tracking_number }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Méthode de paiement</label>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst($order->payment_method) }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Type de commande</label>
                            <p class="mt-1 text-sm text-gray-900">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order->is_draft ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $order->is_draft ? 'Brouillon' : 'Finalisée' }}
                                    </span>
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Nombre d'articles</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $order->products->count() }} article(s)</p>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex justify-between">
                            <span class="text-lg font-medium text-gray-900">Total de la commande</span>
                            <span class="text-2xl font-bold text-indigo-600">{{ number_format($order->total, 2, ',', ' ') }} DH</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Articles de la Commande</h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $order->products->count() }} article(s) dans cette
                        commande</p>
                </div>

                @if($order->products()->count() > 0)
                    <div class="overflow-hidden">
                        <ul class="divide-y divide-gray-200">
                            @foreach($order->products as $product)
                                <li class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center min-w-0">
                                            @if($product && $product->cover)
                                                <img class="h-16 w-16 rounded-lg object-cover"
                                                     src="{{ asset('storage/' . $product->cover->path) }}"
                                                     alt="{{ $product->name }}">
                                            @else
                                                <div class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                                    <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                         stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="ml-4 min-w-0 flex-1">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $product->name ?? 'Produit supprimé' }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate">
                                                    Référence: {{ $product->reference ?? 'N/A' }}
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    {{ $product->category->name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-shrink-0 text-right">
                                            <p class="text-sm text-gray-900">
                                                {{ $product->pivot->quantity }} × {{ number_format($product->pivot->unit_price, 2, ',', ' ') }} DH
                                            </p>
                                            <p class="text-lg font-semibold text-indigo-600 mt-1">
                                                {{ number_format($product->pivot->quantity * $product->pivot->unit_price, 2, ',', ' ') }} DH
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun article</h3>
                        <p class="mt-1 text-sm text-gray-500">Cette commande ne contient aucun article.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
