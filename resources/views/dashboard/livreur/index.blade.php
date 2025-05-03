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
             <a href="{{route('livreur.paiements')}}" class="text-xs md:text-sm text-gray-500 hover:text-gray-700">View all</a>
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
                @foreach ($paiements as $paiement )
                 <tr>
                   <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">{{$paiement->colis->colie_number}}</span></td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">{{ \Carbon\Carbon::parse($paiement->date_paiement)->format('M d, Y \a\t H:i') }}
                   </td>
                   <td class="px-3 py-4 whitespace-nowrap text-xs text-green-700 text-right">+ {{$paiement->montant}} dh</td>
                 </tr>
                @endforeach
                  
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
              <a href="{{route('livreur.commandes')}}" class="text-xs md:text-sm text-gray-500 hover:text-gray-700">View all</a>
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
                 @foreach ($commandes as $commande)
                  <tr>           
                    <td class="px-3 py-4 whitespace-nowrap text-xs font-medium text-gray-900"><span class="bg-gray-100 px-2 py-1 rounded">{{ $commande->commande_number }}</span></td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500">{{ $commande->created_at->format('d/m/Y') }}</td>
                    <td class="px-3 py-4 whitespace-nowrap text-xs text-gray-500 hidden sm:table-cell">{{ $commande->client->utilisateur->name }}</td>
                    <td class="px-3 py-4 whitespace-nowrap hidden md:table-cell">
                       <div class="flex items-center">
                           @if ($commande->commande_statut == 'livree')
                               <span class="mr-2 w-2.5 h-2.5 bg-green-700 rounded-full"></span>
                               <span class="text-xs">Livrée</span>
                           @elseif($commande->commande_statut == 'en_livraison')
                               <span class="mr-2 w-2.5 h-2.5 bg-yellow-700 rounded-full"></span>
                               <span class="text-xs">En livraison</span>
                           @else
                               <span class="mr-2 w-2.5 h-2.5 bg-blue-900 rounded-full"></span>
                               <span class="text-xs">En attente</span>
                           @endif
                       </div>
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap text-right text-xs font-medium">
                      <button onclick="openModalDetails({{ $commande->id }})"
                       class="px-3 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('modal')

@foreach ($commandes as $commande)
<div id="detailsModal{{ $commande->id }}" class="fixed hidden inset-0 bg-black bg-opacity-50 items-center justify-center p-4 z-50">
    <div class="bg-white rounded-md shadow-lg w-full max-w-2xl max-h-[80vh] overflow-y-auto">
      <div class="flex items-center justify-between border-b px-4 sm:px-6 py-3">
        <h2 class="text-base sm:text-md font-medium">Details de Commande N <span class="text-gray-600">{{ $commande->commande_number }}</span></h2>
        <button onclick="closeModalDetails({{ $commande->id }})" class="text-gray-500 hover:text-gray-700">
          <i class="ri-close-line text-2xl"></i>
        </button>
      </div>
      
      <div class="px-4 sm:px-6 py-2 my-1">
        <p class="text-gray-800 text-sm sm:text-base">Date de commande: {{ $commande->created_at->format('d M, Y') }}</p>
      </div>
      
      <div class="px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-8">
        <div class="col-span-1">
          <div class="mb-5">
            <div class="bg-[#f5f5f566] p-1 mb-3">
              <h5 class="text-gray-900 text-sm sm:text-base font-normal">INFORMATION DU PRODUIT</h5>
            </div>
            
            <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
              <div>
                <p class="mb-1 text-sm sm:text-base font-normal">{{ $commande->nom_produit }}</p>
                <p class="text-gray-600 text-sm sm:text-base mb-2">{{ $commande->details_produit }}</p>
              </div>
            </div>
            
            <div class="mt-5">
              <div class="grid grid-cols-1 gap-5">
                <div>
                  <h6 class="mb-2 text-sm sm:text-base font-normal">Details de paiement</h6>
                  <div class="space-y-2">
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm sm:text-base">Prix unitaire:</span>
                      <span class="text-sm sm:text-base font-normal">{{ $commande->prix }} DH</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm sm:text-base">Quantité :</span>
                      <span class="text-sm sm:text-base font-normal">{{ $commande->quantite }}</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm sm:text-base">Total à payer</span>
                      <span class="text-sm sm:text-base font-normal">{{ $commande->total_a_payer }} DH</span>
                    </div>
                  </div>
                </div>
                <div>
                  <h6 class="mb-2 text-sm sm:text-base font-normal">Méthode de paiement</h6>
                  <p class="text-sm sm:text-base text-gray-600">
                    {{ $commande->paiement_type == 'a_la_livraison' ? 'Paiement à la livraison' : 'paiement en ligne' }}
                  </p>
                  @if ($commande->paiement_status == 1)
                    <p class="mt-2 text-sm sm:text-base text-green-700 font-normal">Payé</p>
                  @else
                    <p class="mt-2 text-sm sm:text-base text-red-700 font-normal">Pas encore payé</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-span-1">
          <div class="bg-[#f5f5f566] p-1 mb-3">
            <h5 class="text-gray-900 text-sm sm:text-base font-normal">INFORMATION DU CLIENT</h5>
          </div>
          
          <div class="space-y-3">
            <div>
              <p class="mb-1 text-sm sm:text-base font-normal">Nom Complet</p>
              <p class="text-gray-600 text-sm sm:text-base mb-2">{{ $commande->client->utilisateur->name }}</p>
            </div>
            
            <div>
              <p class="mb-1 text-sm sm:text-base font-normal">Téléphone</p>
              <p class="text-gray-600 text-sm sm:text-base mb-2">{{ $commande->client->utilisateur->phone }}</p>
            </div>
            
            <div>
              <p class="mb-1 text-sm sm:text-base font-normal">Email</p>
              <p class="text-gray-600 text-sm sm:text-base mb-2">{{ $commande->client->utilisateur->email }}</p>
            </div>
            
            <div>
              <p class="mb-1 text-sm sm:text-base font-normal">Adresse de livraison</p>
              <p class="text-gray-600 text-sm sm:text-base mb-2">{{ $commande->client->utilisateur->adresse }}</p>
            </div>
          </div>
        </div>
      </div>

      @if($commande->livraison_statut === "refuser")
      <div class="flex items-center justify-between px-4 py-4 lg:px-6 border-t mt-4 gap-2">
         <p class="text-sm text-red-700">Vous avez refuser la livraison de cette commande</p>
          <button class="px-4 py-1 bg-gradient-to-b from-red-800 to-red-900 text-white text-sm font-normal rounded hover:from-red-900 hover:to-red-950">Supprimer</button>
      </div>
      @elseif($commande->livraison_statut === 'en_attente')
      <div class="flex justify-end p-4 border-t mt-4 gap-2">
       <form method="POST" action="{{ route('commandes.accepter', $commande->id) }}">
          @csrf
          <button class="w-auto px-4 py-1.5 bg-gradient-to-b from-green-700 to-green-800 text-white rounded-md hover:from-green-800 hover:to-green-900 text-sm sm:text-base">
            Accepter
          </button>
      </form>
      <form method="POST" action="{{ route('commandes.refuser', $commande->id) }}">
         @csrf
          <button class="w-auto px-4 py-1.5 bg-gradient-to-b from-red-700 to-red-800 text-white rounded-md hover:from-red-800 hover:to-red-900 text-sm sm:text-base">
            Refuser
          </button>
      </form>
      </div>
      @endif
    </div>
</div>
@endforeach
@endsection

@section('toast')   
@if(session('success'))
<div id="toast-success" class="flex fixed top-6 right-6 z-50 items-center p-4 max-w-xs bg-white rounded-lg border border-gray-200 shadow-lg animate-fade-in">
    <div class="flex-shrink-0">
        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
            <path d="M9 12l2 2l4 -4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div class="ml-3 text-sm font-medium text-gray-900">
        {{ session('success') }}
    </div>
    <button type="button" class="inline-flex p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-gray-400 bg-white rounded-lg hover:text-gray-600 focus:ring-2 focus:ring-gray-100">
        <span class="sr-only">Fermer</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </button>
</div>
@endif

@if(session('error'))
<div id="toast-error" class="flex fixed top-6 right-6 z-50 items-center p-4 max-w-xs bg-white rounded-lg border border-gray-200 shadow-lg animate-fade-in">
    <div class="flex-shrink-0">
        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
            <path d="M15 9l-6 6M9 9l6 6" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div class="ml-3 text-sm font-medium text-gray-900">
        {{ session('error') }}
    </div>
    <button type="button" class="inline-flex p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-gray-400 bg-white rounded-lg hover:text-gray-600 focus:ring-2 focus:ring-gray-100">
        <span class="sr-only">Fermer</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </button>
</div>
@endif
@if($errors->any())
<div id="toast" class="flex fixed top-6 right-6 z-50 items-center p-4 max-w-xs bg-white rounded-lg border border-gray-200 shadow-lg animate-fade-in">
    <div class="flex-shrink-0">
        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
            <path d="M15 9l-6 6M9 9l6 6" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div class="ml-3 text-sm font-medium text-gray-900">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    <button type="button" onclick="this.parentElement.remove()" class="inline-flex p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-gray-400 bg-white rounded-lg hover:text-gray-600 focus:ring-2 focus:ring-gray-100">
        <span class="sr-only">Fermer</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </button>
</div>
@endif
@endsection

@section('script')
    <script>
         function openModalDetails(commandeId) {
            const modal = document.getElementById(`detailsModal${commandeId}`);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModalDetails(commandeId) {
           const modal = document.getElementById(`detailsModal${commandeId}`);
           modal.classList.remove('flex');
           modal.classList.add('hidden');
        }

        setTimeout(() => {
          document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
      }, 3000);   

    </script>
@endsection
