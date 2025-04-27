@extends('layout.master')
@section('main')
<div class="flex-1 overflow-auto bg-white">
    <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Gestion de Clients</h1>
                <p class="text-gray-600 mt-1">Gérer vos clients et leur informations</p>
            </div>
        </div>
    </div>
    <div class="border-b-2"></div>

    <div class="bg-white max-w-full mx-auto lg:p-8 p-4 pt-6">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center mb-8">
           {{-- -------------------- Search ------------------- --}}
            <div class="sm:col-span-4">
                <div class="relative flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute w-5 h-5 top-2.5 left-2.5 text-gray-600">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>
                    <input
                        class="w-full bg-transparent placeholder:text-gray-400 text-gray-700 text-sm border border-gray-200 rounded-md pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                        placeholder="rechercher" 
                    />
                </div>
            </div>
        </div>
       {{-- --------------------------------------- Tableau des clients ---------------------------------------- --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-50">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <th scope="col" class="px-6 py-3">Nom CLIENT</th>
                            <th scope="col" class="px-6 py-3 hidden sm:table-cell">TELEPHONE</th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">EMAIL</th>
                            <th scope="col" class="px-6 py-3 hidden md:table-cell">VILLE</th>
                            <th scope="col" class="px-6 py-3 hidden lg:table-cell">ADRESSE</th>
                            <th scope="col" class="px-6 py-3 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                     @foreach($clients as $client)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $client->utilisateur->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">{{ $client->utilisateur->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">{{ $client->utilisateur->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">{{ $client->utilisateur->ville }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden lg:table-cell">{{ $client->utilisateur->adresse }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex justify-center space-x-2">
                                    <button class="px-3 py-1 bg-gradient-to-b from-red-800 to-red-900 text-white text-xs font-medium rounded hover:from-red-900 hover:to-red-950">Supprimer</button>
                                </div>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination  ------------------------------------------------------------------------------ --}}
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
<div id="clientModal" class="fixed inset-0 bg-black bg-opacity-50  items-center justify-center p-4 z-50 hidden">
 <div class="bg-white rounded-md shadow-lg w-full max-w-2xl max-h-[100vh] overflow-y-auto">
  <div class="flex justify-between items-center p-4 border-b">
    <h2 class="text-xl font-bold text-gray-800">Nouveau Client</h2>
    <button onclick="closeModalClient()" class="text-gray-500 hover:text-gray-700">
      <i class="ri-close-line text-2xl"></i>
    </button>
  </div>
   
  <div class="px-6 py-4">
   <form>
     <div class="mb-6">
       <h3 class="text-sm font-medium text-gray-700 uppercase mb-4 border-b pb-2">INFORMATION DU CLIENT</h3>
         
         <div class="space-y-4">
           <div>
             <label class="block text-sm font-medium text-gray-700 mb-1">Nom Complet</label>
             <input type="text" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow" placeholder="Nom et prénom">
           </div>
           
           <div>
             <label class="block text-sm font-medium text-gray-700 mb-1">Email (optionnel)</label>
             <input type="email" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow" placeholder="email@exemple.com">
           </div>       
           
           <div>
             <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
             <input type="tel" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow" placeholder="Ex: 06 12 34 56 78">
           </div>
           
           <div>
             <label class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
             <select class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
               <option value="">Sélectionnez une ville</option>
               <option value="casablanca">Casablanca</option>
               <option value="rabat">Rabat</option>
               <option value="marrakech">Marrakech</option>
               <option value="fes">Fès</option>
               <option value="tanger">Tanger</option>
               <option value="agadir">Agadir</option>
             </select>
           </div>
           
           <div>
             <label class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
             <input type="text" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow" placeholder="Adresse complète">
           </div>
         </div>
       </div>
       
       <div class="flex justify-end space-x-3 mt-6">
         <button type="button" onclick="closeModalClient()" class="px-4 py-2 rounded-md text-gray-700 hover:bg-gray-100">
           Annuler
         </button>
         <button type="submit" class="px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white rounded-md hover:from-gray-950 hover:to-black">
           Enregistrer
         </button>
       </div>
     </form>
   </div>
 </div>
</div>
@endsection

@section('script')
<script>
    const clientModal = document.getElementById('clientModal');
    function openModalClient(){
     clientModal.classList.remove('hidden');
     clientModal.classList.add('flex');
    }
    function closeModalClient(){
     clientModal.classList.remove('flex');
     clientModal.classList.add('hidden');
    }
</script>

@endsection