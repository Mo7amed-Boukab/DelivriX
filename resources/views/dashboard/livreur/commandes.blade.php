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
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                    27/07/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                    <div class="text-sm text-gray-900">Med Boukab</div>
                                    <div class="text-xs text-gray-500">06 03 38 94 25</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">produit 1
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">150 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">300 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="h-2.5 w-2.5 rounded-full mr-2 bg-yellow-700"></span>
                                        <span class="text-xs">en attende</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button
                                        onclick="openModalDetails()"
                                        class="px-4 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                    27/07/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                    <div class="text-sm text-gray-900">Med Boukab</div>
                                    <div class="text-xs text-gray-500">06 03 38 94 25</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">produit 1
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">150 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">300 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="h-2.5 w-2.5 rounded-full mr-2 bg-green-700"></span>
                                        <span class="text-xs">valider</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button
                                        class="px-4 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                    27/07/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                    <div class="text-sm text-gray-900">Med Boukab</div>
                                    <div class="text-xs text-gray-500">06 03 38 94 25</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">produit
                                    1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">150 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">300 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="h-2.5 w-2.5 rounded-full mr-2 bg-red-700"></span>
                                        <span class="text-xs">annuler</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button
                                        class="px-4 py-1 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-xs font-medium rounded hover:from-gray-950 hover:to-black">Details</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Improved Responsive Pagination -->
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

<div id="detailsModal" class="fixed hidden inset-0 bg-black bg-opacity-50 items-center justify-center p-4 z-50">
    <div class="bg-white rounded-md shadow-lg w-full max-w-3xl max-h-[100vh] overflow-y-auto">
      <div class="flex items-center justify-between border-b px-6 py-3">
        <h2 class="text-lg font-bold">Details de Commande N <span class="text-gray-600">FGT875</span></h2>
        <button onclick="closeModalDetails()" class="text-gray-500 hover:text-gray-700">
          <i class="ri-close-line text-2xl"></i>
        </button>
      </div>
      
      <div class="px-6 py-2 my-1">
        <p class="text-gray-800">Date de commande: 14 Avril, 2025</p>
      </div>
      
      <div class="px-6 grid grid-cols-6 gap-5">
        <div class="col-span-4">
          <div class="mb-5">
            <div class="bg-[#f5f5f566] p-1 mb-3">
              <h5 class="text-gray-900">INFORMATION DU PRODUIT</h5>
            </div>
            
            <div class="mb-4 flex items-center justify-between">
              <div>
                <p class="mb-1">Smartphone XYZ Pro Max</p>
                <p class="text-gray-600 text-sm mb-2">Modèle: SM-12345 | Couleur: Noir</p>
              </div>
              <div class="text-right">
                <p class="mb-1">6065.00 DH</p>
                <p class="text-gray-600 text-sm mb-2">Quantité : 1</p>
              </div>
            </div>
            
            <div class="mt-5">
              <div class="grid grid-cols-4 gap-5 justify-between">
                <div class="col-span-2">
                  <h6 class="mb-2">Details de paiement</h6>
                  <div class="space-y-2">
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm">Prix unitaire:</span>
                      <span class="text-sm">6500.00 DH</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm">Remise 5 %</span>
                      <span class="text-red-700 text-sm">- 325.00 DH</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm">Escompte 2 %</span>
                      <span class="text-red-700 text-sm">- 130.00 DH</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm">Livraison</span>
                      <span class="text-red-700 text-sm">- 50.00 DH</span>
                    </div>
                    <div class="flex justify-between pt-1 border-t">
                      <span class="text-gray-600 text-sm">Total (HT)</span>
                      <span class="text-sm">6045.00 DH</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 text-sm">TVA</span>
                      <span class="text-red-700 text-sm">+ 20.00 DH</span>
                    </div>
                    <div class="flex justify-between pt-1 border-t">
                      <span class="text-gray-600 text-sm">Total (TTC)</span>
                      <span class="text-sm">6065.00 DH</span>
                    </div>
                  </div>
                </div>
                
                <div class="col-span-2 justify-self-end">
                  <h6 class="mb-2">Méthode de paiement</h6>
                  <p class="text-gray-600 text-sm">Paiement à la livraison</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-span-2">
          <div class="bg-[#f5f5f566] p-1 mb-3">
            <h5 class="text-gray-900">INFORMATION DU CLIENT</h5>
          </div>
          
          <div class="space-y-3">
            <div>
              <p class="mb-1">Client ID :</p>
              <p class="text-gray-600 text-sm mb-2">BD54822D</p>
            </div>
            
            <div>
              <p class="mb-1">Nom Complet</p>
              <p class="text-gray-600 text-sm mb-2">Mohammed Alaoui</p>
            </div>
            
            <div>
              <p class="mb-1">Téléphone</p>
              <p class="text-gray-600 text-sm mb-2">06 12 34 56 78</p>
            </div>
            
            <div>
              <p class="mb-1">Email</p>
              <p class="text-gray-600 text-sm mb-2">m.alaoui@exemple.com</p>
            </div>
            
            <div>
              <p class="mb-1">Adresse de livraison</p>
              <p class="text-gray-600 text-sm mb-2">123 Rue Hassan II, Quartier Maarif, Casablanca, 20100</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="flex justify-end p-4 border-t mt-4 mr-2">
        <button class="px-4 py-1.5 bg-gradient-to-b from-green-700 to-green-800 text-white rounded-md hover:from-green-800 hover:to-green-900 mr-3">
          Accepter
        </button>
        <button class="px-4 py-1.5 bg-gradient-to-b from-red-700 to-red-800 text-white rounded-md hover:from-red-800 hover:to-red-900">
          Refuser
        </button>
      </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        const detailsModal = document.getElementById('detailsModal');

        function openModalDetails() {
            detailsModal.classList.remove('hidden');
            detailsModal.classList.add('flex');
        }

        function closeModalDetails() {
            detailsModal.classList.remove('flex');
            detailsModal.classList.add('hidden');
        }
    </script>
@endsection
