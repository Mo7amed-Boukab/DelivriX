@extends('layout.master')
@section('main')
    <div class="main-content flex-1 overflow-auto px-5">
      <header class="p-4 flex justify-between items-center mt-2">
        <div>
          <h1 class="text-3xl font-bold text-gray-800">Tableau de bord</h1>
          <p class="text-sm text-gray-500">Tue, 14 Avr, 2025, 11:30 AM</p>
        </div>
        
        <div class="flex items-center space-x-4">
          <button class="relative p-2 text-gray-500 hover:text-gray-700">
            <i class="fas fa-bell text-xl"></i>
          </button>
          {{-- -----------------------------  Search ---------------------------- --}}
          <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute w-5 h-5 top-2.5 left-2.5 text-slate-600 search-icon">
              <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
            </svg>
            <input
              class="w-full bg-white/80 placeholder:text-slate-400 text-slate-700 text-sm rounded-md pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
              placeholder="Search here" 
            />
          </div>
        </div>
      </header>
      {{--  --------------------------------  Statistique --------------------------------- --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 my-6 mb-10 mt-6">
        <div class="bg-white rounded-lg shadow-sm p-5">
          <div class="flex justify-between items-center mb-2">
            <span class="text-gray-600 text-sm">Total Revenus</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">Aujourd'hui</span>
          </div>
          <div class="h-px bg-gray-200 mb-4"></div>
          <div class="flex justify-between items-center mb-4">
            <span class="text-2xl font-bold">{{ number_format($todayRevenue, 2) }} DH</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600 text-sm">{{ number_format($monthlyRevenue, 2) }} DH</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">ce-mois-ci</span>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm p-5">
          <div class="flex justify-between items-center mb-2">
            <span class="text-gray-600 text-sm">Total Colie livré</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">Aujourd'hui</span>
          </div>
          <div class="h-px bg-gray-200 mb-4"></div>
          <div class="flex justify-between items-center mb-4">
            <span class="text-2xl font-bold">{{ $todayDeliveredColis }} colie</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600 text-sm">{{ $monthlyDeliveredColis }} colie</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">ce-mois-ci</span>
          </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-5">
          <div class="flex justify-between items-center mb-2">
            <span class="text-gray-600 text-sm">Total Colie en livraison</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">Aujourd'hui</span>
          </div>
          <div class="h-px bg-gray-200 mb-4"></div>
          <div class="flex justify-between items-center mb-4">
            <span class="text-2xl font-bold">{{ $todayColisInDelivery }} colie</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600 text-sm">{{ $monthlyColisInDelivery }} colie</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">ce-mois-ci</span>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm p-5">
          <div class="flex justify-between items-center mb-2">
            <span class="text-gray-600 text-sm">Total Commande</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">Aujourd'hui</span>
          </div>
          <div class="h-px bg-gray-200 mb-4"></div>
          <div class="flex justify-between items-center mb-4">
            <span class="text-2xl font-bold">{{ $todayTotalOrders }} commande</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-gray-600 text-sm">{{ $monthlyTotalOrders }} commande</span>
            <span class="text-xs bg-gray-100 px-2 py-1 rounded">ce-mois-ci</span>
          </div>
        </div>
      </div>
      {{-- ------------------------------------- Dernière Paiements -------------------------------------- --}}
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
       <div class="bg-white rounded-lg shadow-sm lg:col-span-1">
         <div class="p-4 md:p-6">
           <div class="flex justify-between items-center mb-4 md:mb-6">
             <h3 class="text-base md:text-lg font-medium text-gray-700">Paiements Récents</h3>
             <a href="" class="text-xs md:text-sm text-gray-500 hover:text-gray-700">View all</a>
           </div>
           <div class="overflow-x-auto">
             <table class="min-w-full divide-y divide-gray-200">
               <thead class="bg-[#f5f5f566]">
                 <tr>
                   <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Command ID</th>
                   <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                   <th scope="col" class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                 </tr>
               </thead>
               <tbody class="bg-white divide-y divide-gray-200">
                 <tr>
                   <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 14, 2025 at 08:10</td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-green-700 text-right">+ 249.50 dh</td>
                 </tr>
                 
                 <tr>
                   <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 14, 2025 at 08:10</td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-green-700 text-right">+ 249.50 dh</td>
                 </tr>
                 
                 <tr>
                   <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 14, 2025 at 08:10</td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-green-700 text-right">+ 249.50 dh</td>
                 </tr>
                 
                 <tr>
                   <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 14, 2025 at 08:10</td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-green-700 text-right">+ 249.50 dh</td>
                 </tr>
               </tbody>
             </table>
           </div>
         </div>
       </div>
       {{-- ----------------------------------- Dernière Commandes ---------------------------------- --}}
        <div class="bg-white rounded-lg shadow-sm lg:col-span-1">
          <div class="p-4 md:p-6">
            <div class="flex justify-between items-center mb-4 md:mb-6">
              <h3 class="text-base md:text-lg font-medium text-gray-700">Commandes Récents</h3>
              <a href="" class="text-xs md:text-sm text-gray-500 hover:text-gray-700">View all</a>
            </div>    
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#f5f5f566]">
                  <tr>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Command ID</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Client</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Status</th>
                    <th scope="col" class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>           
                    <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 20 2025</td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500 hidden sm:table-cell">adnane el falaki</td>
                    <td class="px-3 py-4 whitespace-nowrap hidden md:table-cell">
                      <div class="flex items-center">
                        <span class="h-2.5 w-2.5 rounded-full bg-yellow-700 inline-block mr-2"></span>
                        <span class="text-xs">en attende</span>
                      </div>
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-right text-xs font-medium">
                     <button class="px-3 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                  </td>
                  </tr>

                  <tr>
                    <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 21 2025</td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500 hidden sm:table-cell">zaid boukab</td>
                    <td class="px-3 py-4 whitespace-nowrap hidden md:table-cell">
                      <div class="flex items-center">
                        <span class="h-2.5 w-2.5 rounded-full bg-green-700 inline-block mr-2"></span>
                        <span class="text-xs">validée</span>
                      </div>
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-right text-xs font-medium">
                     <button class="px-3 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                  </td>
                  </tr>
                  
                  <tr>
                    <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 22 2025</td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500 hidden sm:table-cell">ahmed 9asimi</td>
                    <td class="px-3 py-4 whitespace-nowrap hidden md:table-cell">
                      <div class="flex items-center">
                        <span class="h-2.5 w-2.5 rounded-full bg-green-700 inline-block mr-2"></span>
                        <span class="text-xs">valider</span>
                      </div>
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-right text-xs font-medium">
                       <button class="px-3 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">BD54822D</span></td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">Mar 22 2025</td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500 hidden sm:table-cell">adel chemlal</td>
                    <td class="px-3 py-4 whitespace-nowrap hidden md:table-cell">
                      <div class="flex items-center">
                        <span class="h-2.5 w-2.5 rounded-full bg-red-700 inline-block mr-2"></span>
                        <span class="text-xs">annuler</span>
                      </div>
                    </td>
                    <td class="px-3 py-3 whitespace-nowrap text-right text-xs font-medium">
                        <button class="px-3 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection