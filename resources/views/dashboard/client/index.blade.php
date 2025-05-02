@extends('layout.master')
@section('main')
    <main class="px-4 pt-24 mx-auto w-full bg-white sm:px-6 lg:px-28">
        <div class="py-6 mb-8 bg-white border-b-2 border-gray-100">
         <div class="flex justify-between items-center">
          <div class="flex items-center">

              <div class="mr-4">
                  <div class="overflow-hidden h-32 bg-gray-200 border-2 border-gray-300 w-30 rounded-4">
                      <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de profil" class="object-cover w-full h-full" />
                  </div>
          
              </div>

              <div>
                  <h1 class="text-2xl font-bold text-gray-800">{{$user->name}}</h1>
                  <p class="mt-1 text-sm text-gray-600">{{$user->email}}</p>
              </div>
          </div>
          
          <div class="flex flex-col items-end">
              <span class="text-sm font-medium text-gray-700"> {{ $today->translatedFormat('l, d F Y') }}</span>
              <span class="text-xs text-gray-600">Dernière connexion aujourd'hui à {{ now()->format('H:i') }}</span>
          </div>
      </div>
        </div>
        
        {{-- --------------------------------- Bar de Recherche sur Colie ------------------------------- --}}
        <form action="{{ route('colis.recherche') }}" method="GET" class="p-6 mb-8 rounded-lg">
         <div class="mx-auto max-w-3xl">
             <h2 class="mb-4 text-lg font-medium text-gray-800">Rechercher un colis</h2>
             <div class="flex gap-4">
                 <div class="flex-1">
                     <input
                         type="text"
                         name="colieNumber"
                         placeholder="Entrez le numéro du colis (ex: CLS-12345678)"
                         class="px-4 py-2 w-full rounded border border-gray-300 focus:outline-none"
                         required
                     >
                 </div>
                 <button
                     type="submit"
                     class="px-6 py-2 text-white bg-gradient-to-b from-gray-900 rounded to-gray-950 hover:from-gray-950 hover:to-gray-950"
                 >
                     Rechercher
                 </button>
             </div>
         </div>
     </form>
     
     @if ($colis!=null)
     
     <div class="p-6 mx-auto mb-8 max-w-3xl bg-white rounded-lg border border-gray-100 shadow-md">
      <div class="flex flex-col justify-between items-start pb-4 mb-6 border-b border-gray-200 md:flex-row md:items-center">
          <div>
              <h2 class="text-xl font-bold text-gray-800">Colie ID : <span class="font-bold text-gray-900">{{$colis->colie_number}}</span></h2>
              <p class="text-sm text-gray-600">Date de création: 27 Juillet, 2025</p>
          </div>
          <div class="flex gap-3 items-center mt-3 md:mt-0">

                <a href="{{ route('colis.pdf', $colis->id) }}" class="p-2 text-gray-500 transition-colors hover:text-gray-700" title="Télécharger PDF">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
          </div>
      </div>
     
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
     
          <div class="p-4 bg-gray-50 rounded-lg">
              <h3 class="mb-4 text-xs font-medium text-gray-500 uppercase">INFORMATION DU COLIE</h3>
              
              <div class="space-y-4">
                  <div class="grid grid-cols-2 gap-2">
                      <div>
                          <p class="text-sm font-medium text-gray-700">Poids</p>
                          <p class="text-sm text-gray-600">{{$colis->poids}} kg</p>
                      </div>
                      <div>
                          <p class="text-sm font-medium text-gray-700">Dimensions</p>
                          <p class="text-sm text-gray-600">{{$colis->longueur}} × {{$colis->largeur}} × {{$colis->hauteur}} cm</p>
                      </div>
                  </div>
                  
                  <div>
                      <p class="text-sm font-medium text-gray-700">Commande associée</p>
                      <p class="text-sm text-gray-600">{{ $colis->commande->commande_number }} - {{ $colis->commande->client->utilisateur->name }} </p>
                  </div>
                  
                  <div>
                      <p class="text-sm font-medium text-gray-700">Adresse de livraison</p>
                      <p class="text-sm text-gray-600">{{ $colis->commande->client->utilisateur->adresse }} </p>
                  </div>
                  
                  <div>
                      <p class="text-sm font-medium text-gray-700">Méthode de paiement</p>
                      <p class="text-sm text-gray-600">{{$colis->commande->paiement_type == 'a_la_livraison' ? "Paiement à la livraison" : " Paiement en ligne"}}</p>
                  </div>
              </div>
          </div>
          
          <div class="p-4 bg-gray-50 rounded-lg">
              <h3 class="mb-4 text-xs font-medium text-gray-500 uppercase">INFORMATION DU LIVREUR</h3>
              
              <div class="space-y-4">
                  <div>
                      <p class="text-sm font-medium text-gray-700">Entreprise de Livraison</p>
                      <p class="text-sm text-gray-600">{{$colis->commande->livreur->nom_entreprise}}</p>
                  </div>
                  
                  <div>
                      <p class="text-sm font-medium text-gray-700">Nom Livreur</p>
                      <p class="text-sm text-gray-600">{{$colis->commande->livreur->utilisateur->name}}</p>
                  </div>
                  
                  <div>
                      <p class="text-sm font-medium text-gray-700">Téléphone</p>
                      <p class="text-sm text-gray-600">{{$colis->commande->livreur->utilisateur->phone}}</p>
                  </div>
                  
                  <div>
                      <p class="text-sm font-medium text-gray-700">Email</p>
                      <p class="text-sm text-gray-600">{{$colis->commande->livreur->utilisateur->email}}</p>
                  </div>
              </div>
          </div>

      </div>
     </div>
     @else
     <p class="flex justify-center text-md text-gray-700">Pas de colie trouvé par ce ID 
       <span class="px-1 font-medium">'{{$colieNumber}}'</span>
      </p>
     @endif
 
</main>
@endsection 