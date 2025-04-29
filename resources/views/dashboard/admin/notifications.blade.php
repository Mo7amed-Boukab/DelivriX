@extends('layout.master')
@section('main')
<div class="flex-1 overflow-auto bg-white">
 
    <div class="p-4 mx-auto lg:p-8 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Notifications</h1>
                <p class="text-gray-600 mt-1">Gérez et consultez toutes vos notifications</p>
            </div> 
        </div>
    </div>
    <div class="border-b-2"></div>


    <div class="bg-white max-w-full mx-auto lg:p-8 p-4 pt-6">
        <div class="grid grid-cols-1 sm:grid-cols-8 gap-4 items-center mb-8">
            
            <div class="sm:col-span-2">
                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-400">
                    <option value="">Tous les notifications</option>
                    <option value="non_lu">Non lues</option>
                    <option value="lu">Lues</option>
                </select>
            </div>
            
            <div class="flex sm:col-span-6 justify-start sm:justify-end">
              <button class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-sm font-medium rounded-md hover:from-gray-950 hover:to-black transition-colors">
                  <i class="fas fa-check-double"></i>
                  Tout marquer comme lu
              </button>
            </div>
        </div>

      {{-- ------------------------------------- List des Notification --------------------------------------- --}}
        <div class="space-y-4">
            <div class="bg-white rounded-lg shadow-sm border border-gray-50 px-4 py-6 hover:bg-gray-50 transition-colors">
                <div class="flex items-start gap-4">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Livraison refusé</h3>
                                <p class="text-sm text-gray-500 my-2">Commande #CMD-001 de Mohamed Boukab</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500">Il y a 5 minutes</span>
                            </div>
                        </div>
                        <div class="mt-2 flex items-center gap-4">
                            <button class="text-sm text-gray-600 hover:text-gray-900">
                                <i class="fas fa-check mr-1"></i>
                                Marquer comme lu
                            </button>
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center p-6 border-t border-gray-200 mt-8">
            <div class="mb-4 md:mb-0 text-center md:text-left w-full md:w-auto">
                <p class="text-sm text-gray-600">Affichage de 1 à 5 sur 25 notifications</p>
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
@endsection

