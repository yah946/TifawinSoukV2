@extends('layout.admin')

@section('title', 'Tifawin Dashboard')

@section('content')

{{-- CARDS --}}
<section class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">

    {{-- Products --}}
    <div class="bg-gray-100 hover:bg-green-200 transition rounded-2xl shadow-md p-6 flex flex-col items-center justify-center">
        <i class="fa-solid fa-basket-shopping text-3xl mb-3 text-green-700"></i>
        <p class="text-gray-600">Total Products</p>
        <p class="text-2xl font-bold">{{ $productCount }}</p>
    </div>

    {{-- Categories --}}
    <div class="bg-gray-100 hover:bg-green-200 transition rounded-2xl shadow-md p-6 flex flex-col items-center justify-center">
        <i class="fa-solid fa-list text-3xl mb-3 text-green-700"></i>
        <p class="text-gray-600">Total Categories</p>
        <p class="text-2xl font-bold">{{ $categoryCount }}</p>
    </div>

    {{-- Suppliers --}}
    <div class="bg-gray-100 hover:bg-green-200 transition rounded-2xl shadow-md p-6 flex flex-col items-center justify-center">
        <i class="fa-solid fa-user-tie text-3xl mb-3 text-green-700"></i>
        <p class="text-gray-600">Total Suppliers</p>
        <p class="text-2xl font-bold">{{ $supplierCount }}</p>
    </div>

</section>

{{-- CHART --}}
<section class="mt-16 bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-xl font-semibold mb-6 text-gray-700">Statistics Overview</h2>
    <canvas id="myChart"></canvas>
</section>

{{-- Chart.js --}}

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Products', 'Categories', 'Suppliers'],
            datasets: [{
                label: 'Total',
                data: @json([$productCount, $categoryCount, $supplierCount]),
                backgroundColor: [
                    'rgba(34, 197, 94, 0.7)',
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(234, 179, 8, 0.7)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection