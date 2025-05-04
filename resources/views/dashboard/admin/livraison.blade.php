@extends('layout.master')
@section('main')
<div class="overflow-auto flex-1 bg-white">
    <div class="p-4 mx-auto max-w-7xl lg:p-8">
        <div class="flex flex-col justify-between items-start md:flex-row md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Gestion de Livraison</h1>
                <p class="mt-1 text-gray-600">Gérer vos livreurs et leur informations</p>
            </div>
        </div>
    </div>
    <div class="border-b-2"></div>
    
    <div class="p-4 pt-6 mx-auto max-w-full bg-white lg:p-8">
        <div class="grid grid-cols-1 gap-4 items-center mb-8 sm:grid-cols-12">
             {{-- -------------------- Search ------------------- --}}
            <div class="sm:col-span-4">
                <div class="flex relative items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute top-2.5 left-2.5 w-5 h-5 text-gray-600">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>
                    <input
                        class="py-2 pr-3 pl-10 w-full text-sm text-gray-700 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                        placeholder="rechercher" 
                    />
                </div>
            </div>
            
           {{-- -------------------- Filtrages ------------------- --}}
            <div class="sm:col-span-2">
                <select class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    <option value="">Filter par status</option>
                    <option value="active">Active</option>
                    <option value="suspendu">Suspendu</option>
                </select>
            </div>
            
            <div class="flex justify-start sm:col-span-6 sm:justify-end">
             <button onclick="openModalLivreur()"
                  class="flex gap-2 justify-center items-center px-4 py-2 w-full text-sm font-medium text-white bg-gradient-to-b to-gray-900 rounded-md transition-colors from-gray-950 sm:w-auto hover:from-gray-900 hover:to-black">
                  <i class="fas fa-user-plus"></i>
                  Ajouter un livreur
              </button>
       </div>
        </div>
        
        {{-- ------------------------------------ Tableau des livreurs ---------------------------------------- --}}
        <div class="bg-white rounded-lg border border-gray-50 shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr class="text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            <th scope="col" class="px-6 py-3">NOM LIVREUR</th>
                            <th scope="col" class="hidden px-6 py-3 sm:table-cell">TELEPHONE</th>
                            <th scope="col" class="hidden px-6 py-3 md:table-cell">EMAIL</th>
                            <th scope="col" class="hidden px-6 py-3 md:table-cell">VILLE</th>
                            <th scope="col" class="hidden px-6 py-3 lg:table-cell">ADRESSE</th>
                            <th scope="col" class="px-6 py-3">STATUS</th>
                            <th scope="col" class="px-6 py-3 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($livreurs as $livreur)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $livreur->nom_livreur }}</div>
                                    <div class="text-xs text-gray-500">{{ $livreur->nom_entreprise }}</div>
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-700 whitespace-nowrap sm:table-cell">{{ $livreur->utilisateur->phone }}</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-700 whitespace-nowrap md:table-cell">{{ $livreur->utilisateur->email }}</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-700 whitespace-nowrap md:table-cell">{{ $livreur->utilisateur->ville }}</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-700 whitespace-nowrap lg:table-cell">{{ $livreur->utilisateur->adresse }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($livreur->statut == 'active')
                                            <span class="mr-2 w-2.5 h-2.5 bg-green-700 rounded-full"></span>
                                            <span class="text-sm text-gray-700">Active</span>
                                        @else
                                            <span class="mr-2 w-2.5 h-2.5 bg-red-700 rounded-full"></span>
                                            <span class="text-sm text-gray-700">Inactive</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="flex justify-end space-x-2">
                                        <form action="{{ route('admin.livraison.delete', $livreur->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-xs font-medium text-white bg-gradient-to-b from-red-800 to-red-900 rounded hover:from-red-900 hover:to-red-950">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination ----------------------------------------------------------------------------- --}}
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
<div id="livreurModal" class="hidden fixed inset-0 z-50 justify-center items-center p-4 bg-black bg-opacity-50">
 <div class="bg-white rounded-md shadow-lg w-full max-w-2xl max-h-[100vh] overflow-y-auto">
  <div class="flex justify-between items-center p-4 border-b">
    <h2 class="text-xl font-bold text-gray-800">Ajouter un livreur</h2>
    <button onclick="closeModalLivreur()" class="text-gray-500 hover:text-gray-700">
      <i class="text-2xl ri-close-line"></i>
    </button>
  </div>
   
  <div class="px-6 py-4">
   <form method="POST" action="{{ route('admin.livraison.store') }}">
     @csrf
     <div class="mb-6">
       <h3 class="pb-2 mb-4 text-sm font-medium text-gray-700 uppercase border-b">INFORMATION DU LIVREUR</h3>
         
         <div class="space-y-4">
           <div>
             <label class="block mb-1 text-sm font-medium text-gray-700">Entreprise</label>
             <input type="text" name="nom_entreprise" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow" placeholder="Nom d'entreprise">
           </div>
           
           <div>
             <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
             <input type="email" name="email" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow" placeholder="email@exemple.com">
           </div>
           
           <div>
             <label class="block mb-1 text-sm font-medium text-gray-700">Nom Livreur</label>
             <input type="text" name="nom_livreur" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow" placeholder="Nom et prénom">
           </div>
           
           <div>
             <label class="block mb-1 text-sm font-medium text-gray-700">Téléphone</label>
             <input type="tel" name="phone" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow" placeholder="Ex: 06 12 34 56 78">
           </div>
           
           <div>
             <label class="block mb-1 text-sm font-medium text-gray-700">Ville</label>
             <select name="ville" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
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
             <label class="block mb-1 text-sm font-medium text-gray-700">Adresse</label>
             <input type="text" name="adresse" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow" placeholder="Adresse complète">
           </div>

         </div>
       </div>

       <div class="flex justify-end mt-6 space-x-3">
         <button type="button" onclick="closeModalLivreur()" class="px-4 py-2 text-gray-700 rounded-md hover:bg-gray-100">
           Annuler
         </button>
         <button type="submit" class="px-4 py-2 text-white bg-gradient-to-b from-gray-900 rounded-md to-gray-950 hover:from-gray-950 hover:to-black">
           Enregistrer
         </button>
       </div>
     </form>
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
 const livreurModal = document.getElementById('livreurModal');
 function openModalLivreur(){
  livreurModal.classList.remove('hidden');
  livreurModal.classList.add('flex');
 }
 function closeModalLivreur(){
  livreurModal.classList.remove('flex');
  livreurModal.classList.add('hidden');
 }
 setTimeout(() => {
          document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
      }, 3000);    
 </script>
@endsection