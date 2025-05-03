@extends('layout.master')
@section('main')
 <div class="w-full md:w-[calc(100%-260px)] px-5 flex-1 overflow-auto">
     <header class="flex justify-between items-center p-4 mt-2">
         <div>
             <h1 class="text-3xl font-bold text-gray-800">Tableau de bord</h1>
             <p class="text-sm text-gray-500">Lun, 24 Mar, 2025, 11:30 AM</p>
         </div>

         <div class="flex items-center space-x-4">
             <button class="relative p-2 text-gray-500 hover:text-gray-700">
                 <i class="text-xl fas fa-bell"></i>
             </button>

             <div class="flex gap-3 items-center">
                 <div class="hidden text-right sm:block">
                     <p class="text-sm font-medium">Mohamed boukab</p>
                     <p class="text-xs text-gray-500">Administrateur</p>
                 </div>
                 <div class="overflow-hidden w-10 h-10 bg-gray-200 rounded-full">
                     <img src="/api/placeholder/40/40" alt="profile" />
                 </div>
             </div>
         </div>
     </header>
     {{--  ----------------------------------- Statistiques ------------------------------------ --}}
     <div class="grid grid-cols-1 gap-4 my-6 mt-6 mb-10 md:grid-cols-2 lg:grid-cols-4 md:gap-6">
         <div class="p-5 bg-white rounded-lg shadow-sm">
             <div class="flex justify-between items-center mb-2">
                 <span class="text-sm text-gray-600">Commande livrée</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
             </div>
             <div class="mb-4 h-px bg-gray-200"></div>
             <div class="flex justify-between items-center mb-4">
                 <span class="text-2xl font-bold">{{$todayDeliveredOrders}}</span>
                 <span class="flex items-center text-sm text-green-700">
                     <i class="mr-1 fas fa-arrow-up"></i>2.5%
                 </span>
             </div>
             <div class="flex justify-between items-center">
                 <span class="text-sm text-gray-600">{{$monthlyDeliveredOrders}} commande</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
             </div>
         </div>

         <div class="p-5 bg-white rounded-lg shadow-sm">
             <div class="flex justify-between items-center mb-2">
                 <span class="text-sm text-gray-600">Commande en Livraison</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
             </div>
             <div class="mb-4 h-px bg-gray-200"></div>
             <div class="flex justify-between items-center mb-4">
                 <span class="text-2xl font-bold">{{$todayOrdersInDelivery}}</span>
                 <span class="flex items-center text-sm text-green-700">
                     <i class="mr-1 fas fa-arrow-up"></i>2.5%
                 </span>
             </div>
             <div class="flex justify-between items-center">
                 <span class="text-sm text-gray-600">{{$monthlyOrdersInDelivery}} commande</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
             </div>
         </div>

         <div class="p-5 bg-white rounded-lg shadow-sm">
             <div class="flex justify-between items-center mb-2">
                 <span class="text-sm text-gray-600">Total Commande</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
             </div>
             <div class="mb-4 h-px bg-gray-200"></div>
             <div class="flex justify-between items-center mb-4">
                 <span class="text-2xl font-bold">{{$todayTotalOrders}}</span>
                 <span class="flex items-center text-sm text-green-700">
                     <i class="mr-1 fas fa-arrow-up"></i>2.5%
                 </span>
             </div>
             <div class="flex justify-between items-center">
                 <span class="text-sm text-gray-600">{{$monthlyTotalOrders}} commande</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
             </div>
         </div>

         <div class="p-5 bg-white rounded-lg shadow-sm">
             <div class="flex justify-between items-center mb-2">
                 <span class="text-sm text-gray-600">Total Revenus</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
             </div>
             <div class="mb-4 h-px bg-gray-200"></div>
             <div class="flex justify-between items-center mb-4">
                 <span class="text-2xl font-bold">{{ number_format($todayRevenue, 2) }} DH</span>
                 <span class="flex items-center text-sm text-green-700">
                     <i class="mr-1 fas fa-arrow-up"></i>2.5%
                 </span>
             </div>
             <div class="flex justify-between items-center">
                 <span class="text-sm text-gray-600">{{ number_format($monthlyRevenue, 2) }} DH</span>
                 <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
             </div>
         </div>

     </div>

     <div class="flex flex-col gap-6 md:flex-row">
         <div class="p-6 w-full bg-white rounded-lg shadow md:w-1/2">
             <h2 class="mb-6 font-medium text-gray-700">Répartition des revenus par ville</h2>
             <div class="flex flex-col justify-center items-center">
                 <div class="relative w-48 h-48">
                     <canvas id="doughnutChart"></canvas>
                     <div class="flex absolute inset-0 flex-col justify-center items-center">
                         <span class="text-sm text-gray-500">Total Revenus</span>
                         <span class="text-2xl font-bold text-gray-800">58000 dh</span>
                     </div>
                 </div>

                 <div class="flex gap-8 justify-center items-center mt-6 w-full">
                     <div class="flex items-center">
                         <span class="inline-block mr-2 w-4 h-4 bg-black rounded-full"></span>
                         <span class="mr-2 text-gray-600">Casablanca</span>
                     </div>
                     <div class="flex items-center">
                         <span class="inline-block mr-2 w-4 h-4 bg-gray-500 rounded-full"></span>
                         <span class="mr-2 text-gray-600">Rabat</span>
                     </div>
                     <div class="flex items-center">
                         <span class="inline-block mr-2 w-4 h-4 bg-gray-300 rounded-full"></span>
                         <span class="mr-2 text-gray-600">Nador</span>
                     </div>
                 </div>
             </div>
         </div>

         <div class="p-6 w-full bg-white rounded-lg shadow md:w-1/2">
             <div class="flex justify-between items-center mb-6">
                 <h2 class="font-medium text-gray-700">Evolutions des commandes</h2>
                 <div class="flex gap-2">
                     <button class="px-4 py-1 text-sm text-gray-600 rounded-full">jours</button>
                     <button class="px-4 py-1 text-sm text-gray-600 rounded-full">mois</button>
                     <button class="px-4 py-1 text-sm text-white bg-black rounded-full">Années</button>
                 </div>
             </div>
             <div class="h-64">
                 <canvas id="lineChart"></canvas>
             </div>
         </div>
     </div>
@endsection
@section('script')
  <script>
      const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
      const doughnutChart = new Chart(doughnutCtx, {
          type: 'doughnut',
          data: {
              labels: ['Casablanca', 'Rabat', 'Nador'],
              datasets: [{
                  data: [50, 30, 20],
                  backgroundColor: ['#000000', '#808080', '#D3D3D3'],
                  borderWidth: 0,
                  cutout: '75%'
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: true,
              plugins: {
                  legend: {
                      display: false
                  },
                  tooltip: {
                      enabled: true
                  }
              }
          }
      });

      const lineCtx = document.getElementById('lineChart').getContext('2d');
      const lineChart = new Chart(lineCtx, {
          type: 'line',
          data: {
              labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
              datasets: [{
                  label: 'Commandes',
                  data: [200, 300, 250, 200, 380, 350, 450, 400, 320, 250, 220, 300],
                  borderColor: '#000000',
                  borderWidth: 1,
                  backgroundColor: 'rgba(0, 0, 0, 0.1)',
                  fill: true,
                  tension: 0.4,
                  pointRadius: 0
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                  y: {
                      min: 0,
                      max: 500,
                      ticks: {
                          stepSize: 100,
                          callback: function(value) {
                              return value;
                          }
                      },
                      grid: {
                          color: 'rgba(0, 0, 0, 0.05)'
                      }
                  },
                  x: {
                      grid: {
                          display: false
                      }
                  }
              },
              plugins: {
                  legend: {
                      display: false
                  },
                  tooltip: {
                      mode: 'index',
                      intersect: false
                  }
              }
          }
      });
  </script>
@endsection