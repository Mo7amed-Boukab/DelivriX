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
            <div class="px-4 py-6 bg-white rounded-lg border border-gray-200 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="text-sm font-medium text-gray-900<">Colis #CLS-12345678</span>
                        <p class="text-sm text-gray-600">Mohamed Boukab</p>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="mr-2 far fa-calendar"></i>
                        <span>25/03/2024</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="mr-2 far fa-clock"></i>
                        <span>14:30</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="mr-2 fas fa-map-marker-alt"></i>
                        <span>123 Rue de la Paix, 75000 Paris</span>
                    </div>
                </div>             
            </div>

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
            <form action="" method="POST">
                <div class="space-y-4">
                    <div>
                        <label class="block mb-1 text-sm text-gray-700">Colis à livrer</label>
                        <select name="colis_id" required class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
                            <option value="">Sélectionner un colis</option>
                            <option value="1">Colis #CLS-12345678 - Mohamed Boukab</option>
                            <option value="2">Colis #CLS-87654321 - Sarah Martin</option>
                            <option value="3">Colis #CLS-98765432 - Jean Dupont</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block mb-1 text-sm text-gray-700">Date de livraison</label>
                        <input
                            type="date"
                            name="date"
                            required
                            class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                        >
                    </div>
                    
                    <div>
                        <label class="block mb-1 text-sm text-gray-700">Heure de livraison</label>
                        <input
                            type="time"
                            name="heure"
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

</script>
@endsection