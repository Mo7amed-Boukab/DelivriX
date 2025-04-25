<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DelivriX</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>
<body class="flex h-screen  font-sans bg-gray-50">


   @if(auth()->check() && auth()->user()->role == 'administrateur')
   @include('layout.sidebar1')
   @else 
     @include('layout.sidebar2')
   @endif
      
    @yield('main')
    @yield('modal')
    @yield('toast')
    @yield('script')
 
</body>
</html>