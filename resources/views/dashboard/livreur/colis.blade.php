@extends('layout.master')
@section('main')
<div class="overflow-auto flex-1 bg-white">
    <div class="p-4 mx-auto max-w-7xl lg:p-8">
        <div class="flex flex-col justify-between items-start md:flex-row md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Gestion des Colis</h1>
                <p class="mt-1 text-gray-600">Gérer vos colis et leur informations</p>
            </div>
        </div>
    </div>
    <div class="border-b-2"></div>  
    
    <div class="p-4 pt-6 mx-auto max-w-full bg-white lg:p-8">
        <div class="grid grid-cols-1 gap-4 items-center mb-8 sm:grid-cols-12">
            <div class="sm:col-span-3">
                <select class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    <option value="">Filtrer par mois</option>
                    <option value="01">Janvier</option>
                    <option value="02">Février</option>
                    <option value="03">Mars</option>
                    <option value="04">Avril</option>
                    <option value="05">Mai</option>
                    <option value="06">Juin</option>
                    <option value="07">Juillet</option>
                    <option value="08">Août</option>
                    <option value="09">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                </select>
            </div>
            
            <div class="sm:col-span-3">
                <select class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    <option value="">Filtrer par status</option>
                    <option value="en_preparation">En préparation</option>
                    <option value="en_route">En route</option>
                    <option value="livree">Livrée</option>
                </select>
            </div>
            
            <div class="flex justify-start sm:col-span-6 sm:justify-end">
                <button onclick="openModalColie()" class="flex gap-2 justify-center items-center px-4 py-2 w-full text-sm font-medium text-white bg-gradient-to-b from-gray-900 rounded-md transition-colors sm:w-auto to-gray-950 hover:from-gray-950 hover:to-black">
                    <i class="fas fa-plus"></i>
                    Ajouter un Colis
                </button>      
            </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-50 shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#f5f5f566]">
                        <tr class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            <th scope="col" class="px-6 py-3">COLIS ID</th>
                            <th scope="col" class="hidden px-6 py-3 sm:table-cell">DATE</th>
                            <th scope="col" class="hidden px-6 py-3 md:table-cell">DESTINATION</th>
                            <th scope="col" class="hidden px-6 py-3 md:table-cell">CLIENT</th>
                            <th scope="col" class="px-6 py-3">STATUS</th>
                            <th scope="col" class="px-6 py-3 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($colis as $colie)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded">{{ $colie->colie_number }}</span>
                            </td>
                            <td class="hidden px-6 py-4 text-sm text-gray-700 whitespace-nowrap sm:table-cell">{{ $colie->created_at->format('d/m/Y') }}</td>
                            <td class="hidden px-6 py-4 text-sm text-gray-700 whitespace-nowrap md:table-cell">{{ $colie->commande->client->utilisateur->adresse }}</td>
                            <td class="hidden px-6 py-4 whitespace-nowrap md:table-cell">
                                <div class="text-sm text-gray-900">{{ $colie->commande->client->utilisateur->name }}</div>
                                <div class="text-xs text-gray-500">{{ $colie->commande->client->utilisateur->phone }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                @if($colie->statut == 'en_preparation')
                                    <span class="mr-2 w-2.5 h-2.5 bg-blue-900 rounded-full"></span>
                                    <span class="text-xs">En préparation</span>
                                @elseif($colie->statut == 'en_route')
                                    <span class="mr-2 w-2.5 h-2.5 bg-yellow-700 rounded-full"></span>
                                    <span class="text-xs">En route</span>
                                @else
                                    <span class="mr-2 w-2.5 h-2.5 bg-green-700 rounded-full"></span>
                                    <span class="text-xs">Livrée</span>
                                @endif
                              </div>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <button onclick="openModalDetails({{ $colie->id }})" class="px-4 py-1 text-xs font-medium bg-gradient-to-b from-gray-100 to-gray-200 rounded border border-gray-200 text-gray-950 hover:from-gray-200 hover:to-gray-300">Details</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="flex flex-col justify-between items-center p-6 border-t border-gray-200 md:flex-row">
                <div class="mb-4 w-full text-center md:mb-0 md:text-left md:w-auto">
                    <p class="text-sm text-gray-600">Affichage de 1 à 10 sur 45 entrées</p>
                </div>
                
                <div class="flex justify-center items-center space-x-1 w-full md:justify-end md:w-auto">
                    <button class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">Précédent</button>
                    <button class="px-2 py-1 text-xs text-white rounded border sm:px-3 bg-gray-950 sm:text-sm">1</button>
                    <button class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">2</button>
                    <button class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">3</button>
                    <button class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">Suivant</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div id="colisModal" class="hidden fixed inset-0 z-50 justify-center items-center p-4 bg-black bg-opacity-50">
 <div class="bg-white rounded-md shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto">
   <div class="flex sticky top-0 z-10 justify-between items-center px-4 py-3 bg-white border-b sm:px-6">
     <h2 class="text-base font-medium sm:text-lg">Ajouter un Colis</h2>
     <button onclick="closeModalColie()" class="text-gray-500 hover:text-gray-700">
       <i class="text-2xl ri-close-line"></i>
     </button>
   </div>
   
   <div class="p-4 sm:p-6">
     <form action="{{ route('colis.store') }}" method="POST">
       @csrf
       <div class="mb-6">
         <div class="pb-2 mb-4 border-b border-gray-200">
           <h3 class="text-sm font-medium text-gray-700">INFORMATION DU COLIS</h3>
         </div>
         
         <div class="space-y-4">
           <div>
             <label class="block mb-1 text-sm text-gray-700">Commande associée</label>
             <select name="commande_id" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
               <option value="">Sélectionner une commande</option>
               @foreach($commandes as $commande)
                 <option value="{{ $commande->id }}">CMD-{{ $commande->commande_number }} - {{ $commande->client->utilisateur->name }}</option>
               @endforeach
             </select>
           </div>
           
           <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
             <div>
               <label class="block mb-1 text-sm text-gray-700">Poids (kg)</label>
               <input
                 type="number"
                 name="poids"
                 class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                 placeholder="Poids"
                 required
               >
             </div>
             
             <div>
               <label class="block mb-1 text-sm text-gray-700">Hauteur (cm)</label>
               <input
                 type="number"
                 name="hauteur"
                 class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                 placeholder="Hauteur"
                 required
               >
             </div>
           </div>
           
           <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
             <div>
               <label class="block mb-1 text-sm text-gray-700">Longueur (cm)</label>
               <input
                 type="number"
                 name="longueur"
                 class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                 placeholder="Longueur"
                 required
               >
             </div>
             
             <div>
               <label class="block mb-1 text-sm text-gray-700">Largeur (cm)</label>
               <input
                 type="number"
                 name="largeur"
                 class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                 placeholder="Largeur"
                 required
               >
             </div>
           </div>
         </div>
       </div>
       
       <div class="flex gap-2 justify-end mt-6 sm:gap-3">
         <button
           type="button"
           onclick="closeModalColie()"
           class="px-4 py-2 w-auto text-sm text-gray-700 rounded-md hover:bg-gray-100"
         >
           Annuler
         </button>
         <button
           type="submit"
           class="px-4 py-2 w-auto text-sm text-white bg-gradient-to-b from-gray-900 rounded-md to-gray-950 hover:from-gray-950 hover:to-black"
         >
           Enregistrer
         </button>
       </div>
     </form>
   </div>
 </div>
</div>

<div id="detailsModal" class="hidden fixed inset-0 z-50 justify-center items-center p-4 bg-black bg-opacity-50">
 <div class="bg-white rounded-md shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
   <div class="flex sticky top-0 z-10 justify-between items-center px-4 py-3 bg-white border-b sm:px-6">
     <h2 class="text-base font-medium sm:text-md">Details de Colis N <span class="text-gray-600" id="colisNumber"></span></h2>
     <button onclick="closeModalDetails()" class="text-gray-500 hover:text-gray-700">
       <i class="text-2xl ri-close-line"></i>
     </button>
   </div>
   
   <div class="px-4 py-2 my-1 sm:px-6">
     <p class="text-sm text-gray-800 sm:text-base">Date de création: <span></span></p>
   </div>
   
   <div class="grid grid-cols-1 gap-4 px-4 sm:px-6 md:grid-cols-2 sm:gap-8">
     <div>
       <div class="bg-[#f5f5f566] p-1 mb-3">
         <h6 class="text-sm font-normal text-gray-900 sm:text-base">INFORMATION DU COLIS</h6>
       </div>
       
       <div class="space-y-4">
         <div class="flex flex-col sm:flex-row sm:items-center">
           <div class="mb-3 w-full sm:w-1/2 sm:mb-0">
             <p class="mb-1 text-sm font-normal sm:text-base">Poids</p>
             <p class="mb-1 text-sm text-gray-600 sm:text-base"></p>
           </div>
           <div class="w-full text-left sm:w-1/2 sm:text-right">
             <p class="mb-1 text-sm font-normal sm:text-base">Dimensions</p>
             <p class="mb-1 text-sm text-gray-600 sm:text-base"></p>
           </div>
         </div>
         
         <div>
           <p class="mb-1 text-sm font-normal sm:text-base">Commande associée</p>
           <p class="mb-2 text-sm text-gray-600 sm:text-base"></p>
         </div>
         
         <div>
           <p class="mb-1 text-sm font-normal sm:text-base">Statut actuel</p>
           <div class="flex items-center">
           </div>
         </div>   
         <div>
           <p class="mb-2 text-sm font-normal sm:text-base">Mettre à jour status</p>
           <select id="colisStatutSelect" class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
             <option value="">Selectionner une status</option>
             <option value="en_preparation">En préparation</option>
             <option value="en_route">En route</option>
             <option value="livree">Livrée</option>
           </select>
         </div>
       </div>
     </div>
     
     <div>
       <div class="bg-[#f5f5f566] p-1 mb-3">
         <h6 class="text-sm font-normal text-gray-900 sm:text-base">INFORMATION DU CLIENT</h6>
       </div>
       
       <div class="space-y-4">
         <div>
           <p class="mb-1 text-sm font-normal sm:text-base">Nom Complet</p>
           <p class="mb-2 text-sm text-gray-600 sm:text-base"></p>
         </div>
         
         <div>
           <p class="mb-1 text-sm font-normal sm:text-base">Téléphone</p>
           <p class="mb-2 text-sm text-gray-600 sm:text-base"></p>
         </div>
         
         <div>
           <p class="mb-1 text-sm font-normal sm:text-base">Email</p>
           <p class="mb-2 text-sm text-gray-600 sm:text-base"></p>
         </div>
         
         <div>
           <p class="mb-2 text-sm font-normal sm:text-base">Adresse de livraison</p>
           <p class="mb-2 text-sm text-gray-600 sm:text-base"></p>
         </div>
       </div>
     </div>
   </div>

   <div class="px-4 py-2 sm:px-6">
    <p class="mb-2 text-sm font-normal sm:text-base">Dernière adresse</p>
    <input 
      type="text" 
      id="derniereAdresse"
      placeholder="Dernière position arriver" 
      class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
    >
  </div>
   
   <div class="flex gap-2 justify-end p-4 mt-4 border-t">
     <button onclick="closeModalDetails()" class="px-4 py-1.5 w-auto text-sm text-gray-700 rounded-md hover:bg-gray-100 sm:text-base">
      Annuler
     </button>
     <button onclick="updateColisStatus()" class="px-4 py-1.5 w-auto text-sm text-white bg-gradient-to-b from-gray-900 rounded-md to-gray-950 hover:from-gray-950 hover:to-black sm:text-base">
      Enregistrer
     </button>
   </div>
 </div>
</div>
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
  
    const colisModal = document.getElementById('colisModal');
    function openModalColie(){
     colisModal.classList.remove('hidden');
     colisModal.classList.add('flex');
    }
    function closeModalColie(){
     colisModal.classList.remove('flex');
     colisModal.classList.add('hidden');
    }

    const detailsModal = document.getElementById('detailsModal');
    function openModalDetails(colisId){
     detailsModal.classList.remove('hidden');
     detailsModal.classList.add('flex'); 
    }

      setTimeout(() => {
          document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
      }, 3000);   

</script>
@endsection