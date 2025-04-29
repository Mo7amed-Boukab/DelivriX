@extends('layout.master')
@section('main')
    <div class="flex-1 overflow-auto bg-white">

        <div class="p-4 mx-auto lg:p-8 max-w-7xl">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Historique des paiements</h1>
                    <p class="text-gray-600 mt-1">Consulter votre historique des paiements en détails</p>
                </div>
            </div>
        </div>
        <div class="border-b-2"></div>

        <div class="bg-white max-w-full mx-auto lg:p-8 p-4 pt-6">
            <div class="flex justify-end mb-6">
                <button onclick="openModalAjoutPaiement()"
                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white text-sm font-medium rounded-md hover:from-gray-950 hover:to-black transition-colors">
                    <i class="fas fa-plus"></i>
                    Ajouter un paiement
                </button>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-50">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#f5f5f566]">
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th scope="col" class="px-6 py-3">COMMANDE ID</th>
                                <th scope="col" class="px-6 py-3 hidden sm:table-cell">DÉTAILS</th>
                                <th scope="col" class="px-6 py-3 hidden md:table-cell">DATE DE PAIEMENT</th>
                                <th scope="col" class="px-6 py-3 hidden md:table-cell">CLIENT</th>
                                <th scope="col" class="px-6 py-3 text-right">MONTANT</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded">CMD-001</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden sm:table-cell">Livraison
                                    express</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 hidden md:table-cell">
                                    27/07/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                    <div class="text-sm text-gray-900">Med Boukab</div>
                                    <div class="text-xs text-gray-500">06 03 38 94 25</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-green-500">+
                                    249.50 dh</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center p-6 border-t border-gray-200">
                    <div class="mb-4 md:mb-0 text-center md:text-left w-full md:w-auto">
                        <p class="text-sm text-gray-600">Affichage de 1 à 5 sur 45 entrées</p>
                    </div>

                    <div class="flex items-center justify-center md:justify-end space-x-1 w-full md:w-auto">
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">Précédent</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded bg-gray-950 text-white text-xs sm:text-sm">1</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">2</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">3</button>
                        <button
                            class="px-2 sm:px-3 py-1 border rounded text-gray-600 hover:bg-gray-100 text-xs sm:text-sm">Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- -------------------------------------------- Modal Add Paiement --------------------------------------- --}}
    <div id="ajoutPaiementModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center p-4 z-50">
        <div class="bg-white rounded-md shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between border-b px-4 sm:px-6 py-3 sticky top-0 bg-white z-10">
                <h2 class="text-base sm:text-lg font-medium">Ajouter un paiement</h2>
                <button onclick="closeModalAjoutPaiement()" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>

            <div class="p-4 sm:p-6">
                <form>
                    <div class="mb-6">
                        <div class="border-b border-gray-200 pb-2 mb-4">
                            <h3 class="text-sm font-medium text-gray-700">INFORMATION DU PAIEMENT</h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Référence</label>
                                <select
                                    class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                                    <option value="">Sélectionner une référence</option>
                                    <option value="1"> CLS-1234 - Mohamed Boukab</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Client</label>
                                <select
                                    class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                                    <option value="">Sélectionner un client</option>
                                    <option value="1">Mohamed Boukab</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Date de paiement</label>
                                    <input type="date"
                                        class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow">
                                </div>

                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Montant (DH)</label>
                                    <input type="number" step="0.01"
                                        class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                                        placeholder="0.00">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm text-gray-700 mb-1">Notes (optionnel)</label>
                                <textarea
                                    class="w-full bg-transparent placeholder:text-gray-400 text-gray-600 text-sm border border-gray-200 rounded-md px-4 py-2 transition duration-300 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 shadow-sm focus:shadow"
                                    rows="3" placeholder="Ajouter des notes pour ce paiement"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-2 sm:gap-3 mt-6">
                        <button type="button" onclick="closeModalAjoutPaiement()"
                            class="w-full sm:w-auto px-4 py-2 rounded-md text-gray-700 hover:bg-gray-100 text-sm">
                            Annuler
                        </button>
                        <button type="submit"
                            class="w-full sm:w-auto px-4 py-2 bg-gradient-to-b from-gray-900 to-gray-950 text-white rounded-md hover:from-gray-950 hover:to-black text-sm">
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

        const paiementModal = document.getElementById('ajoutPaiementModal');

        function openModalAjoutPaiement() {
            paiementModal.classList.remove('hidden');
            paiementModal.classList.add('flex');
        }

        function closeModalAjoutPaiement() {
            paiementModal.classList.remove('flex');
            paiementModal.classList.add('hidden');
        }
    </script>
@endsection
