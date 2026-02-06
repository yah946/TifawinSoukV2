@extends('layout.admin')

@section('title', 'Tifawin')

@section('content')

<article class=" flex  gap-10 w-full justify-around mt-20">
    <div class=" w-74 h-40 bg-gray-200 rounded-2xl hover:bg-green-200 shadow-md flex flex-col items-center justify-center ">
        <i class="fa-solid fa-basket-shopping"></i>

        <p>Total Products: </p>
        <p>{{ $productCount }}</p>
    </div>
    <div class=" w-74 h-40 bg-gray-200 rounded-2xl hover:bg-green-200 shadow-md flex flex-col items-center justify-center">
        <i class="fa-solid fa-list text-lg"></i>

        <p>Total Categories: </p>
        <p>{{ $categoryCount }}</p>
    </div>
    <div class=" w-74 h-40 bg-gray-200 rounded-2xl hover:bg-green-200 shadow-md flex flex-col items-center justify-center">
        <i class="fa-solid fa-user-tie text-lg"></i>

        <p>Total Suppliers:</p>
        <p> {{ $supplierCount }}</p>
    </div>
</article>


@endsection