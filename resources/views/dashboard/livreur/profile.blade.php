@extends('layout.master')
@section('main')
<div class="overflow-auto flex-1 bg-white">
    <div class="p-4 mx-auto max-w-7xl lg:p-8">
        <div class="flex flex-col justify-between items-start md:flex-row md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Gestion du Profil</h1>
                <p class="mt-1 text-gray-600">Gérez vos informations personnelles et de sécurité</p>
            </div>
        </div>
    </div>
    <div class="border-b-2"></div>

    <div class="p-4 pt-6 mx-auto max-w-full bg-white lg:p-8">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-1">
                <div class="p-6 h-full bg-white rounded-lg border border-gray-50 shadow-sm">
                    <div class="flex flex-col items-center">
                        <div class="flex overflow-hidden justify-center items-center mb-4 w-40 h-40 bg-gray-200 rounded-full">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de profil" class="object-cover w-full h-full">
                            @else
                                <img src="{{ asset('assets/images/avatar-placeholder.png') }}" alt="Photo de profil" class="object-cover w-full h-full">
                            @endif
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h2>
                        <p class="text-sm text-gray-600">Livreur</p>
                        <div class="mt-4 w-full">
                            <form action="{{ route('livreur.profile.photo') }}" method="POST" enctype="multipart/form-data" class="w-full">
                                @csrf
                                @method('PUT')
                                <div class="relative">
                                    <input type="file" name="photo" id="photo" class="hidden" accept="image/*" onchange="this.form.submit()">
                                    <label for="photo" class="flex justify-center items-center px-4 py-2 w-full text-sm text-white bg-gradient-to-b from-gray-900 rounded-md cursor-pointer to-gray-950 hover:from-gray-950 hover:to-black">
                                        Changer la photo
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="pt-4 mt-6 border-t">
                        <h3 class="mb-8 text-sm font-medium text-gray-700">INFORMATIONS DE CONTACT</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="mt-1 mr-3 text-gray-500 fas fa-envelope"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Email</p>
                                    <p class="text-sm text-gray-800">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="mt-1 mr-3 text-gray-500 fas fa-phone"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Téléphone</p>
                                    <p class="text-sm text-gray-800">{{ $user->phone }}</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="mt-1 mr-3 text-gray-500 fas fa-map-marker-alt"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Adresse</p>
                                    <p class="text-sm text-gray-800">{{ $user->adresse }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 mt-6 border-t">
                        <h3 class="mb-8 text-sm font-medium text-gray-700">STATISTIQUES</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-600">Total Commandes Acceptées</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-800">{{ $livreur->commandes->where('livraison_status', 'accepter')->count() }}</span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-600">Colis en Livraison</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-800">{{ $livreur->commandes->where('livraison_status', 'en_livraison')->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-600">Colis Livrés</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-800">{{ $livreur->commandes->where('livraison_status', 'livree')->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="p-6 h-full bg-white rounded-lg border border-gray-50 shadow-sm">
                    <div class="pb-4 mb-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-800">Informations Personnelles</h3>
                    </div>                 
                    <form action="{{ route('livreur.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label class="block mb-1 text-sm text-gray-700">Nom Entreprise</label>
                                <input type="text" name="nom_entreprise" value="{{ old('nom_entreprise', $livreur->nom_entreprise) }}" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('entrepriseName') border-red-500 @enderror">
                                @error('nom_entreprise')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-sm text-gray-700">Nom Livreur</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-sm text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-sm text-gray-700">Téléphone</label>
                                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-sm text-gray-700">Status</label>
                                <select name="statut" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('status') border-red-500 @enderror">
                                    <option value="disponible" {{ old('statut', $livreur->statut) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="indisponible" {{ old('statut', $livreur->statut) == 'indisponible' ? 'selected' : '' }}>Indisponible</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-sm text-gray-700">Ville</label>
                                <input type="text" name="ville" value="{{ old('ville', $user->ville) }}" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('ville') border-red-500 @enderror">
                                @error('ville')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="block mb-1 text-sm text-gray-700">Adresse</label>
                                <input type="text" name="adresse" value="{{ old('adresse', $user->adresse) }}" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('adresse') border-red-500 @enderror">
                                @error('adresse')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex mt-8 justify-first">
                            <button type="submit" class="px-4 py-2 text-sm text-white bg-gradient-to-b from-gray-900 rounded-md to-gray-950 hover:from-gray-950 hover:to-black">
                                Mettre à jour les informations
                            </button>
                        </div>
                    </form>

                    <div class="pt-6 mt-8 border-t">
                        <h3 class="mb-4 text-lg font-medium text-gray-800">Sécurité</h3>
                        <form action="{{ route('livreur.profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <label class="block mb-1 text-sm text-gray-700">Ancien mot de passe</label>
                                    <input type="password" name="current_password" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('current_password') border-red-500 @enderror">
                                    @error('current_password')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block mb-1 text-sm text-gray-700">Nouveau mot de passe</label>
                                    <input type="password" name="password" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow @error('password') border-red-500 @enderror">
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block mb-1 text-sm text-gray-700">Confirmer le mot de passe</label>
                                    <input type="password" name="password_confirmation" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
                                </div>
                            </div>
                            <div class="flex mt-8 justify-first">
                                <button type="submit" class="px-4 py-2 text-sm text-white bg-gradient-to-b from-gray-900 rounded-md to-gray-950 hover:from-gray-950 hover:to-black">
                                    Mettre à jour le mot de passe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
 <button type="button" onclick="this.parentElement.remove()" class="inline-flex p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-gray-400 bg-white rounded-lg hover:text-gray-600 focus:ring-2 focus:ring-gray-100">
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
 setTimeout(() => {
       document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
   }, 3000);   
</script>
@endsection