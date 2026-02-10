<nav class="h-20 bg-white flex items-center justify-around">
        <h1 class="text-2xl font-thin">Tifawin Souk</h1>
        <form action="{{route('products.filter')}}" method="get">
            <input
                name="search"
                class="border border-gray-200 bg-white py-1.5 w-192 pl-4 rounded shadow-sm hover:shadow-md transition-shadow"
                type="text" placeholder="Cherchez un produit, une marque ou une catégorie">
            <button
                class="bg-[#f5891d] hover:bg-[#e07e1b] text-white py-1.5 px-2 rounded shadow-sm hover:shadow-md transition-shadow cursor-pointer">Recherche</button>
        </form>
        <div class="flex gap-4">
            <a class="hover:text-[#f5891d]" href="">Se Connecter</a>
            <a class="hover:text-[#f5891d]" href="">Panier</a>
        </div>
</nav>
