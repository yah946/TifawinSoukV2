@extends('layouts.user')

@section('title', 'Panier - Tifawin Souk')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Votre Panier</h1>

        @if(empty($cart))
            <div class="text-center py-12">
                <div class="text-gray-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-gray-900 mb-2">Votre panier est vide</h3>
                <p class="text-gray-500 mb-6">Commencez vos achats en ajoutant des produits à votre panier</p>
                <a href="{{ route('products.index') }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-lg transition duration-300">
                    Continuer vos achats
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Liste des produits -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b">
                            <h2 class="text-lg font-semibold text-gray-800">Produits dans le panier ({{ count($cart) }}
                                article(s))</h2>
                        </div>

                        <div class="divide-y divide-gray-200">
                            @foreach($cart as $productId => $item)
                                <div class="p-6 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                    <!-- Image du produit -->
                                    <div class="flex-shrink-0">
                                        @if($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}"
                                                 alt="{{ $item['name'] }}"
                                                 class="w-20 h-20 object-cover rounded-lg border">
                                        @else
                                            <div
                                                class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center border">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif

                                        <form action="{{ route('cart.remove', ['productId' => $productId]) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit du panier ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm mt-1 transition-colors flex items-center gap-1 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Informations du produit -->
                                    <div class="flex-grow min-w-0">
                                        <h3 class="text-lg font-medium text-gray-900 truncate">{{ $item['name'] }}</h3>
                                        <p class="text-gray-600 mt-1">{{ number_format($item['price'], 2, ',', ' ') }}
                                            DH</p>
                                    </div>

                                    <!-- Contrôles de quantité -->
                                    <div class="flex items-center gap-3">
                                        <span class="text-gray-600">Quantité:</span>
                                        <span class="w-12 text-center font-medium">{{ $item['quantity'] }}</span>
                                    </div>

                                    <!-- Prix total -->
                                    <div class="flex items-center gap-3">
                                        <span class="text-gray-600 block text-sm">Total:</span>
                                        <p class="text-lg font-semibold text-gray-900">{{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }}
                                            DH</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Actions du panier -->
                        <div class="px-6 py-4 bg-gray-50 border-t flex justify-between items-center">
                            <a href="{{ route('products.index') }}"
                               class="text-orange-600 hover:text-orange-700 font-medium transition-colors">
                                ← Continuer vos achats
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir vider le panier ?')">
                                @csrf
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium transition-colors">
                                    Vider le panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Résumé du panier -->
                <div class="lg:col-span-1">
                    <form method="POST" action="{{ route('cart.validate') }}" class="bg-white rounded-lg shadow-md p-6 sticky top-4" onsubmit="return confirm('Êtes-vous sûr de vouloir procéder au paiement ?')">
                        @csrf
                        <h2 class="text-xl font-bold text-gray-900 mb-6">RÉSUMÉ DU PANIER</h2>

                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sous-total</span>
                                <span class="font-medium">{{ number_format($total, 2, ',', ' ') }} DH</span>
                            </div>

                            <hr class="my-4">

                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                <span class="text-green-600">{{ number_format($total, 2, ',', ' ') }} DH</span>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Mode de paiement</h3>
                            <div class="space-y-3">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="cash" class="h-4 w-4 text-orange-600 focus:ring-orange-500" checked>
                                    <span class="ml-3 text-gray-700">Paiement en espèces</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="paypal" class="h-4 w-4 text-orange-600 focus:ring-orange-500">
                                    <span class="ml-3 text-gray-700">PayPal</span>
                                </label>
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-orange-600 hover:bg-orange-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300 mb-4">
                            Valider la commande
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
