@extends('layout.master')
@section('main')
<div class="flex-1 overflow-auto bg-white">
    <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Gestion des Colis</h1>
                <p class="text-gray-600 mt-1">Gérer vos colis et leur informations</p>
            </div>
        </div>
    </div>
    <div class="border-b-2"></div>
    
    <div class="bg-white max-w-full mx-auto lg:p-8 p-4 pt-6">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center mb-8">
            <div class="sm:col-span-3">
                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400">
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
                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400">
                    <option value="">Filtrer par status</option>
                    <option value="en_preparation">En préparation</option>
                    <option value="en_route">En route</option>
                    <option value="livree">Livrée</option>
                </select>
            </div>
            
            <div class="flex sm:col-span-6 justify-start sm:justify-end">
                <button onclick="openModalColie()" class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-sm font-medium rounded-md hover:from-gray-950 hover:to-black transition-colors">
                    <i class="fas fa-plus"></i>
                    Ajouter un Colis
                </button>      
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-50">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#f5f5f566]">
                        <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <th scope="col" class="px-6 py-3">COLIS ID</th>
                            <th scope="col" class="px-6 py-3 hidden sm:table-cell">DATE</th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">DESTINATION</th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">CLIENT</th>
                            <th scope="col" class="px-6 py-3">STATUS</th>
                            <th scope="col" class="px-6 py-3 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">27/07/2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">15, 2 eme étage, agdal, rabat</td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-900">Med Boukab</div>
                                <div class="text-xs text-gray-500">06 03 38 94 25</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                <span class="h-2.5 w-2.5 rounded-full mr-2 bg-gray-500"></span>
                                <span class="text-xs">En préparation</span>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button onclick="openModalDetails()" class="px-4 py-1  text-xs font-medium rounded text-gray-950 bg-gradient-to-b from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 border border-gray-200">Details</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">27/07/2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">15, 2 eme étage, agdal, rabat</td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-900">Med Boukab</div>
                                <div class="text-xs text-gray-500">06 03 38 94 25</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                <span class="h-2.5 w-2.5 rounded-full mr-2 bg-yellow-500"></span>
                                <span class="text-xs">En route</span>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              <button onclick="openModalDetails()" class="px-4 py-1  text-xs font-medium rounded text-gray-950 bg-gradient-to-b from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 border border-gray-200">Details</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">27/07/2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">15, 2 eme étage, agdal, rabat</td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-900">Med Boukab</div>
                                <div class="text-xs text-gray-500">06 03 38 94 25</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                <span class="h-2.5 w-2.5 rounded-full mr-2 bg-yellow-500"></span>
                                <span class="text-xs">En route</span>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              <button onclick="openModalDetails()" class="px-4 py-1  text-xs font-medium rounded text-gray-950 bg-gradient-to-b from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 border border-gray-200">Details</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">27/07/2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">15, 2 eme étage, agdal, rabat</td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-900">Med Boukab</div>
                                <div class="text-xs text-gray-500">06 03 38 94 25</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                <span class="h-2.5 w-2.5 rounded-full mr-2 bg-green-500"></span>
                                <span class="text-xs">Livrée</span>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              <button onclick="openModalDetails()" class="px-4 py-1  text-xs font-medium rounded text-gray-950 bg-gradient-to-b from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 border border-gray-200">Details</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">27/07/2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">15, 2 eme étage, agdal, rabat</td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-900">Med Boukab</div>
                                <div class="text-xs text-gray-500">06 03 38 94 25</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                <span class="h-2.5 w-2.5 rounded-full mr-2 bg-green-500"></span>
                                <span class="text-xs">Livrée</span>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              <button onclick="openModalDetails()" class="px-4 py-1  text-xs font-medium rounded text-gray-950 bg-gradient-to-b from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 border border-gray-200">Details</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">BD54822D</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">27/07/2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">15, 2 eme étage, agdal, rabat</td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-900">Med Boukab</div>
                                <div class="text-xs text-gray-500">06 03 38 94 25</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                <span class="h-2.5 w-2.5 rounded-full mr-2 bg-green-500"></span>
                                <span class="text-xs">Livrée</span>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                              <button onclick="openModalDetails()" class="px-4 py-1  text-xs font-medium rounded text-gray-950 bg-gradient-to-b from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 border border-gray-200">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-center p-6 border-t border-gray-200">
                <div class="mb-4 md:mb-0 text-center md:text-left w-full md:w-auto">
                    <p class="text-sm text-gray-600">Affichage de 1 à 10 sur 45 entrées</p>
                </div>
                
                <div class="flex items-center justify-center md:justify-end space-x-1 w-full md:w-auto">
                    <button class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">Précédent</button>
                    <button class="px-2 sm:px-3 py-1 border rounded bg-gray-950 text-white text-xs sm:text-sm">1</button>
                    <button class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">2</button>
                    <button class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">3</button>
                    <button class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">Suivant</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div id="colisModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center p-4 z-50">
 <div class="bg-white rounded-md shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto">
   <div class="flex items-center justify-between border-b px-4 sm:px-6 py-3 sticky top-0 bg-white z-10">
     <h2 class="text-base sm:text-lg font-medium">Ajouter un Colis</h2>
     <button onclick="closeModalColie()" class="text-gray-500 hover:text-gray-700">
       <i class="ri-close-line text-2xl"></i>
     </button>
   </div>
   
   <div class="p-4 sm:p-6">
     <form>
       <div class="mb-6">
         <div class="border-b border-gray-200 pb-2 mb-4">
           <h3 class="text-sm font-medium text-gray-700">INFORMATION DU COLIS</h3>
         </div>
         
         <div class="space-y-4">
           <div>
             <label class="block text-sm text-gray-700 mb-1">Commande associée</label>
             <select class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
               <option value="">Sélectionner une commande</option>
               <option value="1">CMD-001 - Mohamed Boukab</option>
               <option value="2">CMD-002 - Sophia Anderson</option>
               <option value="3">CMD-003 - Ahmed Khalid</option>
             </select>
           </div>
           
           <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
             <div>
               <label class="block text-sm text-gray-700 mb-1">Poids (kg)</label>
               <input
                 type="text"
                class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                 placeholder="Poids"
               >
             </div>
             
             <div>
               <label class="block text-sm text-gray-700 mb-1">Hauteur (cm)</label>
               <input
                 type="text"
                class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                 placeholder="Hauteur"
               >
             </div>
           </div>
           
           <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
             <div>
               <label class="block text-sm text-gray-700 mb-1">Longueur (cm)</label>
               <input
                 type="text"
                class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                 placeholder="Longueur"
               >
             </div>
             
             <div>
               <label class="block text-sm text-gray-700 mb-1">Largeur (cm)</label>
               <input
               class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                 placeholder="Largeur"
               >
             </div>
           </div>
         </div>
       </div>
       
       <div class="flex justify-end gap-2 sm:gap-3 mt-6">
         <button
           type="button"
           onclick="closeModalColie()"
           class="w-auto px-4 py-2 rounded-md text-gray-700 hover:bg-gray-100 text-sm"
         >
           Annuler
         </button>
         <button
           type="submit"
           class="w-auto px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white rounded-md hover:from-gray-950 hover:to-black text-sm"
         >
           Enregistrer
         </button>
       </div>
     </form>
   </div>
 </div>
</div>

<div id="detailsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center p-4 z-50">
 <div class="bg-white rounded-md shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
   <div class="flex items-center justify-between border-b px-4 sm:px-6 py-3 sticky top-0 bg-white z-10">
     <h2 class="text-base sm:text-md font-medium">Details de Colis N <span class="text-gray-600">FGT875</span></h2>
     <button onclick="closeModalDetails()" class="text-gray-500 hover:text-gray-700">
       <i class="ri-close-line text-2xl"></i>
     </button>
   </div>
   
   <div class="px-4 sm:px-6 py-2 my-1">
     <p class="text-gray-800 text-sm sm:text-base">Date de création: 27 Juillet, 2025</p>
   </div>
   
   <div class="px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-8">
     <div>
       <div class="bg-[#f5f5f566] p-1 mb-3">
         <h6 class="text-gray-900 text-sm sm:text-base font-normal">INFORMATION DU COLIS</h6>
       </div>
       
       <div class="space-y-4">
         <div class="flex flex-col sm:flex-row sm:items-center">
           <div class="w-full sm:w-1/2 mb-3 sm:mb-0">
             <p class="mb-1 text-sm sm:text-base font-normal">Poids</p>
             <p class="text-gray-600 text-sm sm:text-base mb-1">2.5 kg</p>
           </div>
           <div class="w-full sm:w-1/2 text-left sm:text-right">
             <p class="mb-1 text-sm sm:text-base font-normal">Dimensions</p>
             <p class="text-gray-600 text-sm sm:text-base mb-1">30 × 20 × 15 cm</p>
           </div>
         </div>
         
         <div>
           <p class="mb-1 text-sm sm:text-base font-normal">Commande associée</p>
           <p class="text-gray-600 text-sm sm:text-base mb-2">CMD-001 - Mohamed Boukab</p>
         </div>
         
         <div>
           <p class="mb-1 text-sm sm:text-base font-normal">Statut actuel</p>
           <div class="flex items-center">
             <span class="h-3 w-3 rounded-full mr-2 bg-blue-500"></span>
             <span class="text-gray-600 text-sm sm:text-base">En préparation</span>
           </div>
          </div>   
         <div>
           <p class="mb-2 text-sm sm:text-base font-normal">Mettre à jour status</p>
           <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400">
             <option value="">Selectionner une status</option>
             <option value="en_preparation">En préparation</option>
             <option value="en_route">En route</option>
             <option value="livree">Livrée</option>
             <option value="retournee">Retournée</option>
           </select>
         </div>
       </div>
     </div>
     
     <div>
       <div class="bg-[#f5f5f566] p-1 mb-3">
         <h6 class="text-gray-900 text-sm sm:text-base font-normal">INFORMATION DU CLIENT</h6>
       </div>
       
       <div class="space-y-4">
         <div>
           <p class="mb-1 text-sm sm:text-base font-normal">Nom Complet</p>
           <p class="text-gray-600 text-sm sm:text-base mb-2">Mohammed Alaoui</p>
         </div>
         
         <div>
           <p class="mb-1 text-sm sm:text-base font-normal">Téléphone</p>
           <p class="text-gray-600 text-sm sm:text-base mb-2">06 12 34 56 78</p>
         </div>
         
         <div>
           <p class="mb-1 text-sm sm:text-base font-normal">Email</p>
           <p class="text-gray-600 text-sm sm:text-base mb-2">m.alaoui@exemple.com</p>
         </div>
         
         <div>
           <p class="mb-2 text-sm sm:text-base font-normal">Adresse de livraison</p>
           <p class="text-gray-600 text-sm sm:text-base mb-2">123 Rue Hassan II, Quartier Maarif, Casablanca, 20100</p>
         </div>
       </div>
     </div>
   </div>

   <div class="px-4 sm:px-6 py-2">
    <p class="mb-2 text-sm sm:text-base font-normal">Dernière adresse</p>
    <input 
      type="text" 
      placeholder="Dernière position arriver" 
      class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
    >
  </div>
   
   <div class="flex justify-end p-4 border-t mt-4 gap-2">
     <button onclick="closeModalDetails()" class="w-auto px-4 py-1.5 rounded-md text-gray-700 hover:bg-gray-100 text-sm sm:text-base">
      Annuler
     </button>
     <button class="w-auto px-4 py-1.5 bg-gradient-to-b from-gray-900 to-gray-950 text-white rounded-md hover:from-gray-950 hover:to-black text-sm sm:text-base">
      Enregistrer
     </button>
   </div>
 </div>
</div>
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
    function openModalDetails(){
     detailsModal.classList.remove('hidden');
     detailsModal.classList.add('flex');
    }
    function closeModalDetails(){
     detailsModal.classList.remove('flex');
     detailsModal.classList.add('hidden');
    }
</script>

@endsection