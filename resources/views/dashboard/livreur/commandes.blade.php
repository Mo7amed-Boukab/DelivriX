@extends('layout.master')
@section('main')
<div class="flex-1 overflow-auto bg-white">
        <div class="p-4 mx-auto lg:p-8 max-w-7xl ">
         <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
           <div>
             <h1 class="text-2xl font-bold text-gray-800 ">Gestion des Commandes</h1>
               <p class="text-gray-600 mt-1 ">Gérer vos commande et leur informations</p>
           </div>
         </div>
       </div>
       <div class=" border-b-2"></div>

        <div class="bg-white max-w-full mx-auto lg:p-8 p-4 pt-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 items-center mb-8">
             {{-- ---------------------------------- Search --------------------------------- --}}
                <div class="sm:col-span-2 lg:col-span-4">
                    <div class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="absolute w-5 h-5 top-2.5 left-2.5 text-gray-600">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        <input
                            class="w-full bg-transparent placeholder:text-gray-400 text-gray-900 text-sm border border-gray-200 rounded-md pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                            placeholder="rechercher .." />
                    </div>
                </div>
              {{-- ---------------------------------  Filtrage --------------------------------- --}}
                <div class="sm:col-span-1 lg:col-span-2">
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400">
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

                <div class="sm:col-span-1 lg:col-span-2">
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400">
                        <option value="">Filtrer par statut</option>
                        <option value="en_cours">En cours</option>
                        <option value="termine">Terminé</option>
                        <option value="annule">Annulé</option>
                    </select>
                </div>
            </div>
            {{-- ----------------------------------- Tableau des Commandes ------------------------------------ --}}
            <div class="bg-white rounded-lg shadow-sm border border-gray-50">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-white">
                            <tr class="text-left text-xs font-thin text-gray-900 uppercase">
                                <th scope="col" class="px-6 py-3">COMMANDE ID</th>
                                <th scope="col" class="px-6 py-3 hidden sm:table-cell">DATE</th>
                                <th scope="col" class="px-6 py-3 hidden md:table-cell">CLIENT</th>
                                <th scope="col" class="px-6 py-3 hidden md:table-cell">PRODUIT</th>
                                <th scope="col" class="px-6 py-3 hidden md:table-cell">QUANTITÉ</th>
                                <th scope="col" class="px-6 py-3 hidden md:table-cell">PRIX</th>
                                <th scope="col" class="px-6 py-3 hidden md:table-cell">MONTANT TTC</th>
                                <th scope="col" class="px-6 py-3">STATUS</th>
                                <th scope="col" class="px-6 py-3 text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                         @foreach ($commandes as $commande)
                         <tr>
                             <td class="px-6 py-4 whitespace-nowrap">
                                 <span
                                     class="px-2.5 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded">{{ $commande->commande_number }}</span>
                             </td>
                             <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap sm:table-cell">
                                 {{ $commande->created_at->format('d/m/Y') }}
                             </td>
                             <td class="hidden px-6 py-4 whitespace-nowrap md:table-cell">
                                 <div class="text-sm text-gray-900">{{ $commande->client->utilisateur->name }}</div>
                                 <div class="text-xs text-gray-500">{{ $commande->client->utilisateur->phone }}</div>
                             </td>
                             <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">
                                 {{ $commande->nom_produit }}
                             </td>
                             <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">
                                 {{ $commande->quantite }}
                             </td>
                             <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">
                                 {{ $commande->prix }} DH
                             </td>
                             <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">
                                 {{ $commande->total_a_payer }} DH
                             </td>
                             <td class="px-6 py-4 whitespace-nowrap">
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
                             <td class="px-6 py-4 text-center whitespace-nowrap">
                                 <button onclick="openModalDetails({{ $commande->id }})"
                                     class="px-4 py-1 text-xs font-medium text-white bg-gradient-to-b from-gray-900 rounded to-gray-950 hover:from-gray-950 hover:to-black border border-gray-200">Details</button>
                             </td>
                         </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="flex flex-col md:flex-row justify-between items-center p-6 border-t border-gray-200">
                    <div class="mb-4 md:mb-0 text-center md:text-left w-full md:w-auto">
                        <p class="text-sm text-gray-600">Affichage de 1 à 10 sur 45 entrées</p>
                    </div>

                    <div class="flex items-center justify-center md:justify-end space-x-1 w-full md:w-auto">
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">Précédent</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded bg-gray-950 text-white text-xs sm:text-sm">1</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">2</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">3</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">Suivant</button>
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
    </script>
@endsection
