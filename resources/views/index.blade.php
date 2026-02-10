@extends('layout.user')
@section('content')
<section class="flex gap-4 max-w-6xl mx-auto rounded py-2 px-4">
            <div class="flex flex-col bg-white max-w-fit mx-auto rounded border border-gray-200 shadow-sm py-2 px-4">
                @foreach ($categories as $category)
                <div class="pb-2">
                    <a class="hover:text-orange-500 text-sm" href="{{route('index.filter',['c'=>$category->id])}}">{{$category->name}}</a>
                </div>
                @endforeach
            </div>
            <div style="background-image: url('/images/SX.jpg');" class="flex-1 rounded bg-cover bg-center" >
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
            <div class="flex justify-between bg-white w-full py-2 px-4 shadow-sm">
                <p>Filtrer Par Prix En Dhs</p>
                <form id="formPrice" action="{{route('index.filter')}}" method="get">
                    <input id="min" class="border pl-4 w-24 border-[#7b1fa2] text-[#7b1fa2]" placeholder="min" type="number" name="min_price">
                    <input id="max" class="border pl-4 w-24 border-[#7b1fa2] text-[#7b1fa2]" placeholder="max" type="number" name="max_price">
                </form>
                <script>
                    const form = document.getElementById('formPrice');
                    form.addEventListener('keypress',function(e){
                        if(e.key==='Enter'){
                            e.preventDefault();
                            form.submit();
                        }
                    })
                </script>
            </div>
            <div class="flex flex-wrap gap-4 bg-white w-full text-2xl py-2 px-4 shadow-sm">
                @forelse ($products as $product)
                <article class="w-64 bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow ">
                    <a href="#">
                        <div class="border border-black">
                            <img src="{{asset('storage/'.$product->cover->path)}}" alt="{{$product->name}}">
                        </div>
                        <div class="text-sm text-gray-500 p-2 pb-1">{{$product->name}}</div>
                        <div class="text-xs text-black p-2 pb-1">{{$product->price}} Dhs</div>
                    </a>
                </article>
                @empty
                <div class="w-full text-center">
                    <p class="text-sm text-gray-500 p-2 pb-1">items are in draft mode, inactive, or not assigned to a sales channel in TifawinSouk platform</p>
                </div>
                @endforelse
            </div>
            
        </section>
@endsection