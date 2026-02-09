@extends('layouts.user')
@section('content')
    <section class="flex gap-4 max-w-6xl mx-auto rounded py-2 px-4">
        <div class="flex flex-col bg-white max-w-fit mx-auto rounded border border-gray-200 shadow-sm py-2 px-4">
            @foreach ($categories as $category)
                <div class="pb-2">
                    <a class="hover:text-orange-500 text-sm" href="#">{{$category->name}}</a>
                </div>
            @endforeach
        </div>
        <div style="background-image: url('/images/SX.jpg');" class="flex-1 rounded bg-cover bg-center">
        </div>
        <div class="flex flex-col max-w-fit gap-2 ">
            <div class="flex-1 bg-white rounded border border-gray-200 shadow-sm py-2 px-4">
                <div class="pb-2">
                    <p class="text-sm">Centre d'assistance</p>
                    <p class="text-gray-400 text-xs">Guide du service client</p>
                </div>
                <div class="pb-2">
                    <p class="text-sm">WhatsApp</p>
                    <p class="text-gray-400 text-xs">Discuter pour commander</p>
                </div>
                <div class="pb-2">
                    <p class="text-sm">Vendez sur TifawinSouk</p>
                    <p class="text-gray-400 text-xs">Ouvrez votre shop ici</p>
                </div>
            </div>
            <div class="flex-1 w-56 h-56">
                <img src="/images/TF.png" alt="">
            </div>
        </div>
    </section>
    <section class="max-w-6xl mx-auto rounded py-2 px-4">
        <div class="bg-[#7b1fa2] w-full text-white text-2xl py-2 px-4 shadow-sm">Profitez des meilleurs deals</div>
        <div class="flex flex-wrap gap-4 bg-white w-full text-2xl py-2 px-4 shadow-sm">
            @forelse ($products as $product)
                <article class="w-64 bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow ">
                    <a href="{{ route('products.show', $product) }}">
                        <div class="border border-black">
                            <img
                                src="{{ $product->cover ? asset('storage/'.$product->cover->path) : 'https://static.vecteezy.com/system/resources/previews/014/369/980/non_2x/pictures-line-inverted-icon-free-vector.jpg'}}"
                                alt="{{$product->name}}">
                        </div>
                        <div class="text-sm text-gray-500 p-2 pb-1">{{$product->name}}</div>
                        <div class="text-xs text-black p-2 pb-1">{{$product->price}} Dhs</div>
                    </a>
                </article>
            @empty
                <div class="w-full text-center">
                    <p class="text-sm text-gray-500 p-2 pb-1">items are in draft mode, inactive, or not assigned to a
                        sales channel in TifawinSouk platform</p>
                </div>
            @endforelse
        </div>

    </section>
@endsection
