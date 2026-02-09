<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://kit.fontawesome.com/fd784d3edb.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Dashboard</title>
</head>

<body class="flex  font-sans bg-gray-100">

  <!-- SIDEBAR -->
  <x-side-bar></x-side-bar>
  <!-- MAIN CONTENT -->
  <main class="flex-1 relative min-h-screen flex flex-col justify-between">
    <!-- CONTENT -->
    <section class="p-6">
      @yield('content')
    </section>

  </main>

</body>
</html>
