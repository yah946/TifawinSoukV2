<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://kit.fontawesome.com/fd784d3edb.js" crossorigin="anonymous"></script>
  <title>Dashboard</title>
</head>

<body class="flex  font-sans bg-gray-100">

  <!-- SIDEBAR -->
  <aside class="sticky top-0 h-screen w-[15%] 
                bg-linear-to-t from-[#ffa929] to-[#ff9d26] flex flex-col">

    <!-- PLATFORM NAME -->
    <div class="flex flex-col items-center py-4">
      <p class="font-bold text-lg text-amber-50"> TIFAWIN SOUK <i class="fa-solid fa-basket-shopping"></i></p>
      <hr class="border-4 w-3/4 mt-2">
    </div>

    <!-- NAVIGATION -->
    <nav class="flex flex-col gap-6 mt-6 items-start px-4">
      <a href="{{route('admin.dashboard')}}" class="flex items-center gap-3 text-white hover:text-green-400">
        <i class="fa-solid fa-grip text-lg"></i>
        <span class="font-medium">DASHBOARD</span>
      </a>

      <a href="{{route('admin.products.index')}}" class="flex items-center gap-3 text-white hover:text-green-400">
<i class="fa-solid fa-basket-shopping"></i>
        <span class="font-medium">PRODUCTS</span>
      </a>

      <a href="{{route('admin.products.index')}}" class="flex items-center gap-3 text-white hover:text-green-400">
        <i class="fa-solid fa-list text-lg"></i>
        <span class="font-medium">CATEGORIES</span>
      </a>

      <a href="{{route('admin.products.index')}}" class="flex items-center gap-3 text-white hover:text-green-400">
        <i class="fa-solid fa-user-tie text-lg"></i>
        <span class="font-medium">SUPPLIERS</span>
      </a>
       <a href="{{route('admin.products.index')}}" class="flex items-center gap-3 text-white hover:text-green-400">
      <i class="fa-solid fa-cart-arrow-down"></i>
        <span class="font-medium">COMMENDS</span>
      </a>
       <a href="{{route('admin.products.index')}}" class="flex items-center gap-3 text-white hover:text-green-400">
<i class="fa-solid fa-users"></i>
        <span class="font-medium">USERS</span>
      </a>

      <a href="{{route('admin.products.index')}}" class="flex items-center gap-3 text-white  mt-auto hover:text-red-500">
        <i class="fa-solid fa-right-from-bracket text-lg"></i>
        <span class="font-medium">LOG OUT</span>
      </a>
    </nav>

  </aside>

  <!-- MAIN CONTENT -->
  <main class="flex-1 relative min-h-screen flex flex-col justify-between">

    <!-- CONTENT -->
    <section class="p-6">
      @yield('content')
    </section>

    <!-- FOOTER -->
    <footer class=" bottom-0 bg-gray-200 flex flex-col items-center py-3 w-full border-t">
      <hr class="border-2 border-gray-400 w-1/2 mb-1">
      <p class="text-sm text-gray-700">© Copy Right</p>
    </footer>

  </main>

</body>
</html>
