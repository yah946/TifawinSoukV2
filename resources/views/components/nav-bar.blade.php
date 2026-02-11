<nav class="h-20 bg-white flex items-center justify-around">
        <h1 class="text-2xl font-thin"><a href="/">Tifawin Souk</a></h1>
        <form action="{{route('products.filter')}}" method="get">
            <input
                name="search"
                class="border border-gray-200 bg-white py-1.5 w-xl pl-4 rounded shadow-sm hover:shadow-md transition-shadow"
                type="text" placeholder="Cherchez un produit, une marque ou une catégorie">
            <button
                class="bg-[#f5891d] hover:bg-[#e07e1b] text-white py-1.5 px-2 rounded shadow-sm hover:shadow-md transition-shadow cursor-pointer">Recherche</button>
        </form>
        <div class="flex gap-4 items-center">
             @if (Route::has('login'))
            <div class="flex items-center justify-end gap-4 relative">
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                                class="text-sm text-[#1b1b18] px-4 py-2 rounded hover:text-orange-500 cursor-pointer flex items-center gap-2">
                            Bonjour {{ Auth::user()->name }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-50">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full cursor-pointer text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Se Déconnecter
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                
                    <a href="{{ route('register') }}" class="hover:text-[#f5891d] text-sm">
                        Se connecter
                    </a>
                @endauth

            </div>
        @endif
            <a class="hover:text-[#f5891d]" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i> Panier</a>
        </div>
</nav>
