@extends('layout.master')
@section('main')
<div class="overflow-auto flex-1 bg-white">

    <div class="p-4 mx-auto max-w-7xl lg:p-8">
        <div class="flex flex-col justify-between items-start md:flex-row md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Rendez-vous de Livraison</h1>
                <p class="mt-1 text-gray-600">Gérer vos rendez-vous de livraison</p>
            </div>
        </div>
    </div>
    <div class="border-b-2"></div>

    <div class="p-4 pt-6 mx-auto max-w-7xl bg-white">

        <div class="flex justify-end mt-4 mb-8">
            <button onclick="openModalAjoutLivraison()" class="flex gap-2 justify-center items-center px-4 py-2 w-full text-sm font-medium text-white bg-gradient-to-b from-gray-900 rounded-md transition-colors sm:w-auto to-gray-950 hover:from-gray-950 hover:to-black">
                <i class="fas fa-plus"></i>
                Nouveau rendez-vous
            </button>
        </div>

        {{-- ---------------------------------  Liste des rendez vous de Livraison -------------------------------- --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
         @foreach($colisLivraison as $rdv)
            <div class="px-4 py-6 bg-white rounded-lg border border-gray-200 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="text-sm font-medium text-gray-900<">Colis ID : {{$rdv->colie_number}}</span>
                        <p class="text-sm text-gray-600">Client - {{$rdv->commande->client->utilisateur->name}}</p>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="mr-2 far fa-calendar"></i>
                        <span>{{ \Carbon\Carbon::parse($rdv->date_sortie)->format('d/m/Y')}}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="mr-2 far fa-clock"></i>
                        <span>{{ \Carbon\Carbon::parse($rdv->heure_sortie)->format('H:i')}}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="mr-2 fas fa-map-marker-alt"></i>
                        <span>{{$rdv->commande->client->utilisateur->adresse}}</span>
                    </div>
                </div>          
            </div>
            @endforeach   
        </div>
    </div>
</div>

{{--  ---------------------------------  Modal Ajoute Rendez vous pour la livraison ---------------------------------- --}}
<div id="ajoutLivraisonModal" class="hidden fixed inset-0 z-50 justify-center items-center p-4 bg-black bg-opacity-50">
 <div class="bg-white rounded-md shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto">
     <div class="flex sticky top-0 z-10 justify-between items-center px-4 py-3 bg-white border-b sm:px-6">
         <h2 class="text-base font-medium sm:text-lg">Ajouter un rendez-vous de livraison</h2>
         <button onclick="closeModalAjoutLivraison()" class="text-gray-500 hover:text-gray-700">
             <i class="text-2xl ri-close-line"></i>
         </button>
     </div>
     
     <div class="p-4 sm:p-6">
         <form action="{{ route('livreur.rendez-vous.store') }}" method="POST">
             @csrf
             <div class="space-y-4">
                 <div>
                     <label class="block mb-1 text-sm text-gray-700">Colis à livrer</label>
                     <select name="colis_id" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
                         <option value="">Sélectionner un colis</option>
                         @foreach($colis as $colie)
                             <option value="{{ $colie->id }}">
                                 Colis #{{ $colie->colie_number }} - {{ $colie->commande->client->name }} 
                             </option>
                         @endforeach
                     </select>
                 </div>
                 
                 <div>
                     <label class="block mb-1 text-sm text-gray-700">Date de livraison</label>
                     <input
                         type="date"
                         name="date_sortie"
                         required
                         class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                     >
                 </div>
                 
                 <div>
                     <label class="block mb-1 text-sm text-gray-700">Heure de livraison</label>
                     <input
                         type="time"
                         name="heure_sortie"
                         required
                         class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                     >
                 </div>
             </div>
             
             <div class="flex flex-col gap-2 justify-end mt-6 sm:flex-row sm:gap-3">
                 <button
                     type="button"
                     onclick="closeModalAjoutLivraison()"
                     class="px-4 py-2 w-full text-sm text-gray-700 rounded-md sm:w-auto hover:bg-gray-100"
                 >
                     Annuler
                 </button>
                 <button
                     type="submit"
                     class="px-4 py-2 w-full text-sm text-white bg-gradient-to-b from-gray-900 rounded-md sm:w-auto to-gray-950 hover:from-gray-950 hover:to-black"
                 >
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
 const livraisonModal = document.getElementById('ajoutLivraisonModal');
 
 function openModalAjoutLivraison() {
     livraisonModal.classList.remove('hidden');
     livraisonModal.classList.add('flex');
 }
 
 function closeModalAjoutLivraison() {
     livraisonModal.classList.remove('flex');
     livraisonModal.classList.add('hidden');
 }

 setTimeout(() => {
       document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
   }, 3000);   

</script>
@endsection