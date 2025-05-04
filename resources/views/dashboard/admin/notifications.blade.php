@extends('layout.master')
@section('main')
<div class="overflow-auto flex-1 bg-white">
 
    <div class="p-4 mx-auto max-w-7xl lg:p-8">
        <div class="flex flex-col justify-between items-start md:flex-row md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Notifications</h1>
                <p class="mt-1 text-gray-600">Gérez et consultez toutes vos notifications</p>
            </div> 
        </div>
    </div>
    <div class="border-b-2"></div>


    <div class="p-4 pt-6 mx-auto max-w-full bg-white lg:p-8">
        <div class="grid grid-cols-1 gap-4 items-center mb-8 sm:grid-cols-8">
            
            <div class="sm:col-span-2">
                <select class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    <option value="">Tous les notifications</option>
                    <option value="non_lu">Non lues</option>
                    <option value="lu">Lues</option>
                </select>
            </div>
            
            <div class="flex justify-start sm:col-span-6 sm:justify-end">
              <button class="flex gap-2 justify-center items-center px-4 py-2 w-full text-sm font-medium text-white bg-gradient-to-b from-gray-900 rounded-md transition-colors sm:w-auto to-gray-950 hover:from-gray-950 hover:to-black">
                  <i class="fas fa-check-double"></i>
                  Tout marquer comme lu
              </button>
            </div>
        </div>

      {{-- ------------------------------------- List des Notification --------------------------------------- --}}
        <div class="space-y-4">
            @forelse($notifications as $notification)
            <div class="px-4 py-6 bg-white rounded-lg border border-gray-50 shadow-sm transition-colors hover:bg-gray-50">
                <div class="flex gap-4 items-start">
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">{{ $notification->titre }}</h3>
                                <p class="my-2 text-sm text-gray-500">{{ $notification->message }}</p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="flex gap-4 items-center mt-2">
                            <button class="text-sm text-gray-600 hover:text-gray-900">
                                <i class="mr-1 fas fa-check"></i>
                                Marquer comme lu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="px-4 py-6 bg-white rounded-lg border border-gray-50 shadow-sm">
                <p class="text-center text-gray-500">Aucune notification pour le moment</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

