@extends('layouts.user')

@section('title', ucfirst($product->name))

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white my-8 rounded-lg shadow-sm">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column - Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="aspect-square bg-gray-300 rounded-lg overflow-hidden">
                    <img
                        src="{{ $product->cover ? asset('storage/' . $product->cover->path) : 'https://static.vecteezy.com/system/resources/previews/014/369/980/non_2x/pictures-line-inverted-icon-free-vector.jpg' }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover"
                        id="mainImage"
                    />
                </div>
            </div>

            <!-- Right Column - Product Details -->
            <div class="space-y-6">
                <!-- Badge and Wishlist -->
                <div class="flex items-start justify-between">
                    <span
                        class="inline-flex items-center rounded-md bg-teal-700 px-2 py-1 text-xs font-medium text-white inset-ring inset-ring-blue-400/30">{{ $product->category->name }}</span>
                </div>

                <!-- Title -->
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">
                    {{ $product->name }}
                </h1>

                <!-- Brand -->
                <div class="text-sm">
                    <span class="text-gray-600">Réference: </span>
                    <span class="hover:underline">{{ $product->reference }}</span>
                </div>

                <!-- Price -->
                <div class="flex items-baseline gap-3 flex-wrap">
                    <span class="text-4xl lg:text-5xl font-bold text-gray-900">{{ number_format($product->price, 2, ',', ' ') }} Dh</span>
                </div>

                <!-- Shipping -->
                <p class="text-sm text-gray-600">
                    + livraison à partir de 15.00 Dhs vers CASABLANCA - Anfa
                </p>

                <!-- Color Options -->
                <div>
                    <p class="text-sm font-semibold text-gray-700 mb-3">VOIR D'AUTRES IMAGES:</p>
                    <div class="swiper">
                        <div class="swiper-wrapper grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4 mb-8">
                            @foreach($product->images as $image)
                                <div class="swiper-slide">
                                    <button
                                        onclick="changeImage(this, '{{ asset('storage/' . $image->path) }}')"
                                        class="aspect-square rounded-lg overflow-hidden border-2 border-gray-200 transition-all w-[90px] h-[90px]"
                                    >
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->name }}"
                                             class="w-full h-full object-cover">
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>

                <!-- Quantity & Add to Cart -->
                <form method="POST" action="{{ route('cart.add-product', $product) }}" class="flex items-center gap-4 flex-wrap">
                    @csrf
                    <div class="flex items-center border-2 border-gray-200 rounded overflow-hidden">
                        <button onclick="decreaseQuantity()"
                                class="bg-orange-500 text-white flex-1 px-6 py-3 rounded-lg hover:bg-orange-600 transition font-bold">
                            −
                        </button>
                        <input id="quantity" name="quantity" readonly
                               class="px-8 py-3 text-lg font-medium max-w-[100px] text-center" value="1"/>
                        <button onclick="increaseQuantity({{ $product->stock }})"
                                class="bg-orange-500 text-white flex-1 px-6 py-3 rounded-lg hover:bg-orange-600 transition font-bold">
                            +
                        </button>
                    </div>
                    <button type="submit"
                            class="bg-orange-500 text-white flex-1 px-6 py-3 rounded-lg hover:bg-orange-600 transition font-bold">
                        Ajouter au panier
                    </button>
                </form>
            </div>
        </div>

        <!-- Autres options du même category -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">AUTRES OPTIONS</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <a href="{{ route('products.show', ['product' => $relatedProduct]) }}">
                            <img
                                src="{{ $relatedProduct->cover ? asset('storage/' . $relatedProduct->cover->path) : 'https://static.vecteezy.com/system/resources/previews/014/369/980/non_2x/pictures-line-inverted-icon-free-vector.jpg' }}"
                                alt="{{ $relatedProduct->name }}"
                                class="w-full h-48 object-cover"
                            />
                            <div class="p-4">
                                <h3 class="text-sm font-semibold text-gray-900 truncate">{{ $relatedProduct->name }}</h3>
                                <p class="text-lg font-bold text-gray-900 mt-2">{{ number_format($relatedProduct->price, 2, ',', ' ') }}
                                    Dh</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const quantityInput = document.getElementById('quantity');

        // Quantity functions
        function increaseQuantity(maxQuantity = 10) {
            let quantity = parseInt(quantityInput.value);
            if (quantity < maxQuantity) {
                quantityInput.value = quantity + 1;
            }
        }

        function decreaseQuantity() {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        }

        // Image gallery
        function changeImage(button, imageUrl) {
            document.getElementById('mainImage').src = imageUrl;

            // Remove active class from all thumbnails
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => {
                thumb.classList.remove('border-blue-500');
                thumb.classList.add('border-gray-200');
            });

            // Add active class to clicked thumbnail
            button.classList.remove('border-gray-200');
            button.classList.add('border-blue-500');
        }
    </script>
@endsection
