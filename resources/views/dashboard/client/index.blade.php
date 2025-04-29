@extends('layout.master')
@section('main')
    <main class="bg-white pt-24 px-4 mx-auto w-full sm:px-6 lg:px-28">
        <div class="py-6 mb-8 bg-white border-b-2 border-gray-100">
         <div class="flex justify-between items-center">
          <div class="flex items-center">

              <div class="mr-4">
                  <div class="w-30 h-32 rounded-4 bg-gray-200 overflow-hidden border-2 border-gray-300">
                      <img src="/api/placeholder/100/100" alt="Photo de profil" class="w-full h-full object-cover" />
                  </div>
              </div>

              <div>
                  <h1 class="text-2xl font-bold text-gray-800">mohamed boukab</h1>
                  <p class="mt-1 text-sm text-gray-600">mohamedboukab@gmail.com</p>
              </div>
          </div>
          
          <div class="flex flex-col items-end">
              <span class="text-sm font-medium text-gray-700">Mardi, 29 avril 2025</span>
              <span class="text-xs text-gray-600">Dernière connexion aujourd'hui à 10:15</span>
          </div>
      </div>
        </div>
        
        {{-- --------------------------------- Bar de Recherche sur Colie ------------------------------- --}}
        <div class=" rounded-lg p-6 mb-8">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-lg font-medium text-gray-800 mb-4">Rechercher un colis</h2>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <input type="text"
                            placeholder="Entrez le numéro du colis (ex: CLS-12345678)"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none"
                        >
                    </div>
                    <button class="px-6 py-2 bg-gradient-to-b from-gray-800 to-gray-900 text-white rounded hover:from-gray-900 hover:to-gray-950">
                        Rechercher
                    </button>
                </div>
            </div>
        </div>

      

       {{-- ------------------------------- Sections des Colies Sauvegardé -------------------------------- --}}
       <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Mes Colis Sauvegardés</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
         {{-- ----------------------------------------- Colie -------------------------------------- --}}
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">Colis ID : <span class="text-gray-900 font-bold">LF45436</span></h3>
                            <p class="text-sm text-gray-600">Date : 27 Juillet, 2025</p>
                        </div>
                        <button class="text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="mt-4 grid grid-cols-2 gap-x-6 gap-y-3">
                        <div>
                            <h4 class="text-xs uppercase text-gray-500 font-medium">INFORMATION DU COLIS</h4>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Poids</p>
                                <p class="text-sm text-gray-600">2.5kg</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Dimensions</p>
                                <p class="text-sm text-gray-600">30 × 20 × 15 cm</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Date d'arrivée estimée</p>
                                <p class="text-sm text-gray-600">16 Avril, 2025</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Statut actuel</p>
                                <div class="flex items-center mt-1">
                                    <span class="flex w-3 h-3 bg-yellow-400 rounded-full mr-2"></span>
                                    <span class="text-sm text-gray-600">En route</span>
                                </div>
                                <p class="text-sm text-red-500 mt-1">Pas encore payé</p>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-xs uppercase text-gray-500 font-medium">INFORMATION DU LIVREUR</h4>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Entreprise de Livraison</p>
                                <p class="text-sm text-gray-600">ATP Transport</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Nom Livreur</p>
                                <p class="text-sm text-gray-600">Mohammed Alaoui</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Téléphone</p>
                                <p class="text-sm text-gray-600">06 12 34 56 78</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5 flex justify-end">
                        <a href="#" class="px-4 py-1 bg-gray-800 text-white rounded hover:bg-gray-900 text-sm font-medium">Détails</a>
                    </div>
                </div>
            </div>
            
            <!-- Colis 2 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-800">Colis ID : <span class="text-gray-900 font-bold">LF32198</span></h3>
                            <p class="text-sm text-gray-600">Date : 15 Avril, 2025</p>
                        </div>
                        <button class="text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="mt-4 grid grid-cols-2 gap-x-6 gap-y-3">
                        <div>
                            <h4 class="text-xs uppercase text-gray-500 font-medium">INFORMATION DU COLIS</h4>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Poids</p>
                                <p class="text-sm text-gray-600">1.8kg</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Dimensions</p>
                                <p class="text-sm text-gray-600">25 × 18 × 12 cm</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Date d'arrivée estimée</p>
                                <p class="text-sm text-gray-600">5 Mai, 2025</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Statut actuel</p>
                                <div class="flex items-center mt-1">
                                    <span class="flex w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                    <span class="text-sm text-gray-600">Livré</span>
                                </div>
                                <p class="text-sm text-green-600 mt-1">Payé</p>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-xs uppercase text-gray-500 font-medium">INFORMATION DU LIVREUR</h4>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Entreprise de Livraison</p>
                                <p class="text-sm text-gray-600">Express Maroc</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Nom Livreur</p>
                                <p class="text-sm text-gray-600">Ahmed Benjelloun</p>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm font-medium text-gray-700">Téléphone</p>
                                <p class="text-sm text-gray-600">06 98 76 54 32</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5 flex justify-end">
                        <a href="#" class="px-4 py-1 bg-gray-800 text-white rounded hover:bg-gray-900 text-sm font-medium">Détails</a>
                    </div>
                </div>
           </div>
       </div>
   </div>
</main>
@endsection 