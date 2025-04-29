@extends('layout.master')
@section('main')
<div class="bg-white pt-24 px-4 mx-auto w-full sm:px-6 lg:px-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-gray-50 p-6">
                    <div class="flex flex-col items-center">
                        <div class="w-40 h-40 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden mb-4">
                            <img src="{{ asset('assets/images/avatar-placeholder.png') }}" alt="Photo de profil" class="w-full h-full object-cover">
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">Mohamed Boukab</h2>
                        <p class="text-gray-600 text-sm">Livreur</p>
                        <div class="mt-4 w-full">
                            <button class="w-full px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white rounded-md hover:from-gray-950 hover:to-black text-sm">
                                Changer la photo
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-6 border-t pt-4">
                        <h3 class="text-sm font-medium text-gray-700 mb-8">INFORMATIONS DE CONTACT</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-envelope text-gray-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Email</p>
                                    <p class="text-sm text-gray-800">mohamed.boukab@example.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone text-gray-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Téléphone</p>
                                    <p class="text-sm text-gray-800">06 03 38 94 25</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-gray-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Adresse</p>
                                    <p class="text-sm text-gray-800">123 Rue Mohammed V, Casablanca</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm border border-gray-50 p-6">
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <h3 class="text-lg font-medium text-gray-800">Informations Personnelles</h3>
                    </div>                 
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Nom</label>
                                <input type="text" value="Mohamed" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Prénom</label>
                                <input type="text" value="Boukab" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Email</label>
                                <input type="email" value="mohamed.boukab@example.com" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Téléphone</label>
                                <input type="tel" value="06 03 38 94 25" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm text-gray-700 mb-1">Adresse</label>
                                <input type="text" value="123 Rue Mohammed V, Casablanca" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                            </div>
                        </div>
                        
                        <div class="mt-8 border-t pt-6">
                            <h3 class="text-lg font-medium text-gray-800 mb-4">Sécurité</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Nouveau mot de passe</label>
                                    <input type="password" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Confirmer le mot de passe</label>
                                    <input type="password" class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 flex justify-first">
                            <button type="submit" class="px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white rounded-md hover:from-gray-950 hover:to-black text-sm">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

