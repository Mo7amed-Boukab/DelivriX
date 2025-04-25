@extends('layout.master')
@section('main')
    <div class="overflow-auto flex-1 bg-white">
        <div class="p-4 mx-auto max-w-7xl lg:p-8">
            <div class="flex flex-col justify-between items-start md:flex-row md:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Gestion des Commandes</h1>
                    <p class="mt-1 text-gray-600">Gérer vos commande et leur informations</p>
                </div>
            </div>
        </div>
        <div class="border-b-2"></div>

        <div class="p-4 pt-6 mx-auto max-w-full bg-white lg:p-8">
            <div class="grid grid-cols-1 gap-4 items-center mb-8 sm:grid-cols-2 lg:grid-cols-12">
                {{-- -------------------- Search ------------------- --}}
                <div class="sm:col-span-2 lg:col-span-4">
                    <div class="flex relative items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="absolute top-2.5 left-2.5 w-5 h-5 text-gray-600">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        <input
                            class="py-2 pr-3 pl-10 w-full text-sm text-gray-900 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                            placeholder="rechercher .." />
                    </div>
                </div>
                {{-- -------------------- Filterages ------------------- --}}
                <div class="sm:col-span-1 lg:col-span-2">
                    <select
                        class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        <option value="">Filtrer par mois</option>
                        <option value="01">Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Août</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </div>

                <div class="sm:col-span-1 lg:col-span-2">
                    <select
                        class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        <option value="">Filtrer par statut</option>
                        <option value="en_cours">En cours</option>
                        <option value="termine">Terminé</option>
                        <option value="annule">Annulé</option>
                    </select>
                </div>
              {{-- ------------------------- Ajoute d'une Commande ----------------------------- --}}
                <div class="flex justify-start sm:col-span-4 sm:justify-end">
                    <button onclick="openModalCommande()"
                        class="flex gap-2 justify-center items-center px-4 py-2 w-full text-sm font-medium text-white bg-gradient-to-b from-gray-950 to-gray-900 rounded-md transition-colors sm:w-auto hover:from-gray-900 hover:to-black">
                        <i class="fas fa-plus"></i>
                        Nouvelle Commande
                    </button>
                </div>
            </div>
            {{-- --------------------------------------- Tableau des commandes Ajouté ---------------------------------------- --}}
            <div class="bg-white rounded-lg border border-gray-50 shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-white">
                            <tr class="text-xs font-thin text-left text-gray-900 uppercase">
                                <th scope="col" class="px-6 py-3">COMMANDE ID</th>
                                <th scope="col" class="hidden px-6 py-3 sm:table-cell">DATE</th>
                                <th scope="col" class="hidden px-6 py-3 md:table-cell">CLIENT</th>
                                <th scope="col" class="hidden px-6 py-3 md:table-cell">PRODUIT</th>
                                <th scope="col" class="hidden px-6 py-3 md:table-cell">QUANTITÉ</th>
                                <th scope="col" class="hidden px-6 py-3 md:table-cell">PRIX</th>
                                <th scope="col" class="hidden px-6 py-3 md:table-cell">MONTANT TTC</th>
                                <th scope="col" class="px-6 py-3">STATUS</th>
                                <th scope="col" class="px-6 py-3 text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Order Row 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded">BD54822D</span>
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap sm:table-cell">
                                    27/07/2025</td>
                                <td class="hidden px-6 py-4 whitespace-nowrap md:table-cell">
                                    <div class="text-sm text-gray-900">Med Boukab</div>
                                    <div class="text-xs text-gray-500">06 03 38 94 25</div>
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">produit 1
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">2</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">150 DH
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">300 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2 w-2.5 h-2.5 bg-gray-400 rounded-full"></span>
                                        <span class="text-xs">en attende</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <button onclick="openModalDetails2()"
                                        class="px-4 py-1 text-xs font-medium text-white bg-gradient-to-b  from-gray-900 to-gray-950 rounded hover:from-gray-950 hover:to-black">Details</button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded">BD54822D</span>
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap sm:table-cell">
                                    27/07/2025</td>
                                <td class="hidden px-6 py-4 whitespace-nowrap md:table-cell">
                                    <div class="text-sm text-gray-900">Med Boukab</div>
                                    <div class="text-xs text-gray-500">06 03 38 94 25</div>
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">produit 1
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">2</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">150 DH
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">300 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2 w-2.5 h-2.5 bg-green-700 rounded-full"></span>
                                        <span class="text-xs">valider</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <button onclick="openModalDetails()"
                                        class="px-4 py-1 text-xs font-medium text-white bg-gradient-to-b  from-gray-900 to-gray-950 rounded hover:from-gray-950 hover:to-black">Details</button>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded">BD54822D</span>
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap sm:table-cell">
                                    27/07/2025</td>
                                <td class="hidden px-6 py-4 whitespace-nowrap md:table-cell">
                                    <div class="text-sm text-gray-900">Med Boukab</div>
                                    <div class="text-xs text-gray-500">06 03 38 94 25</div>
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">produit
                                    1</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">2</td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">150 DH
                                </td>
                                <td class="hidden px-6 py-4 text-sm text-gray-900 whitespace-nowrap md:table-cell">300 DH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="mr-2 w-2.5 h-2.5 bg-red-700 rounded-full"></span>
                                        <span class="text-xs">annuler</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <button
                                        class="px-4 py-1 text-xs font-medium text-white bg-gradient-to-b from-gray-900 to-gray-950 rounded hover:from-gray-950 hover:to-black">Details</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
               {{-- Pagination --------------------------------------------------------------------------------------------------------- --}}
                <div class="flex flex-col justify-between items-center p-6 border-t border-gray-200 md:flex-row">
                    <div class="mb-4 w-full text-center md:mb-0 md:text-left md:w-auto">
                        <p class="text-sm text-gray-600">Affichage de 1 à 10 sur 45 entrées</p>
                    </div>

                    <div class="flex justify-center items-center space-x-1 w-full md:justify-end md:w-auto">
                        <button
                            class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">Précédent</button>
                        <button
                            class="px-2 py-1 text-xs text-white bg-gray-950 rounded border sm:px-3 sm:text-sm">1</button>
                        <button
                            class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">2</button>
                        <button
                            class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">3</button>
                        <button
                            class="px-2 py-1 text-xs text-gray-600 rounded border sm:px-3 hover:bg-gray-100 sm:text-sm">Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    {{-- ------------------------------------------  Modal d'Ajoute des Commandes -------------------------------------------- --}}
    <div id="commandeModal" class="hidden fixed inset-0 z-50 justify-center items-center p-4 bg-black bg-opacity-50">
        <div class="bg-white rounded-md shadow-lg w-full max-w-4xl max-h-[100vh] overflow-y-auto">
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-xl font-medium text-gray-800">Nouvelle Commande</h2>
                <button onclick="closeModalCommande()" class="text-gray-500 hover:text-gray-900">
                    <i class="text-2xl ri-close-line"></i>
                </button>
            </div>

            <div class="px-6 py-4">
                <form>
                    <div class="mb-4">
                        <h3 class="flex justify-between items-center pb-2 mb-2 text-sm font-medium text-gray-900 uppercase border-b cursor-pointer"
                            onclick="toggleSection('clientInfo')">
                            INFORMATION DU CLIENT
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform"
                                id="clientInfoIcon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </h3>
                        <div id="clientInfo" class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Nom Complet</label>
                                <input type="text"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Nom et prénom">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Téléphone</label>
                                <input type="tel"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Ex: 06 12 34 56 78">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Email (optionnel)</label>
                                <input type="email"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="email@exemple.com">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Ville</label>
                                <select
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
                                    <option value="">Sélectionnez une ville</option>
                                    <option value="casablanca">Casablanca</option>
                                    <option value="rabat">Rabat</option>
                                    <option value="marrakech">Marrakech</option>
                                    <option value="fes">Fès</option>
                                    <option value="tanger">Tanger</option>
                                    <option value="agadir">Agadir</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block mb-1 text-sm font-normal text-gray-900">Adresse</label>
                                <input type="text"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Adresse complète">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="flex justify-between items-center pb-2 mb-2 text-sm font-medium text-gray-900 uppercase border-b cursor-pointer"
                            onclick="toggleSection('produitInfo')">
                            INFORMATION DU PRODUIT
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform"
                                id="produitInfoIcon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </h3>

                        <div id="produitInfo" class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Produit</label>
                                <input type="text"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Nom du produit">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Description</label>
                                <input type="text"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Details complémentaire">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Prix Unitaire (DH)</label>
                                <input type="text"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Prix unitaire">
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Quantité</label>
                                <input type="number"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Quantité">
                            </div>

                          {{--  Container pour stocker les réductions ajoutés ------------------------------------------------------------------ --}}
                            <div id="reductionFields" class="col-span-1 md:col-span-2">

                            </div>
                          {{-- ----------------------------------------------------------------------------------------------------------------- --}}
                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Réduction</label>
                                <div class="relative">
                                    <button type="button" onclick="ajouterReduction()"
                                        class="flex justify-between items-center px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 ease hover:border-gray-300 focus:shadow">
                                        <span>Ajouter une réduction</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Montant Total (DH)</label>
                                <input type="text"
                                    class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow"
                                    placeholder="Calculé automatiquement" readonly>
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-normal text-gray-900">Image</label>
                                <div class="p-4 text-center bg-gray-50 rounded-md cursor-pointer"
                                    onclick="document.getElementById('fileInput').click()">
                                    <input type="file" id="fileInput" accept="image/jpeg,image/png,image/svg+xml"
                                        class="hidden">
                                    <div class="flex flex-col justify-center items-center">
                                        <div class="mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5">
                                                <rect x="3" y="3" width="18" height="18" rx="2"
                                                    ry="2" stroke="currentColor" />
                                                <circle cx="8.5" cy="8.5" r="1.5" stroke="currentColor" />
                                                <polyline points="21 15 16 10 5 21" stroke="currentColor" />
                                                <line x1="14" y1="14" x2="19" y2="19"
                                                    stroke="currentColor" />
                                            </svg>
                                        </div>
                                        <p class="text-base text-gray-900"><span class="text-gray-600">Importer</span> une
                                            image pour commande</p>
                                        <p class="mt-1 text-sm text-gray-500">Les types d'images supporter sont: JPG, PNG,
                                            SVG</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="mb-4">
                                    <label class="block mb-1 text-sm font-normal text-gray-900">Méthode de paiement</label>
                                    <div class="relative">
                                        <select
                                            class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 appearance-none placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
                                            <option value="livraison">Paiement à la livraison</option>
                                            <option value="carte">Carte bancaire</option>
                                            <option value="virement">Virement bancaire</option>
                                        </select>
                                        <div
                                            class="flex absolute inset-y-0 right-0 items-center px-2 text-gray-900 pointer-events-none">
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block mb-1 text-sm font-normal text-gray-900">Statut de paiement</label>
                                    <div class="relative">
                                        <select
                                            class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 appearance-none placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow">
                                            <option value="non_paye">Pas encore payé</option>
                                            <option value="paye">Payé</option>
                                        </select>
                                        <div
                                            class="flex absolute inset-y-0 right-0 items-center px-2 text-gray-900 pointer-events-none">
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-3">
                        <button type="button" onclick="closeModalCommande()"
                            class="px-4 py-2 text-gray-900 bg-gray-100 rounded-md hover:bg-gray-200">
                            Annuler
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-white bg-gradient-to-b from-gray-900 to-gray-950 rounded-md hover:from-gray-950 hover:to-black">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- --------------------- Modal 1 pour Details des commandes : après d'assigner commande --------------------------- --}}
    <div id="detailsModal" class="hidden fixed inset-0 z-50 justify-center items-center p-4 bg-black bg-opacity-50">
        <div class="bg-white rounded-md shadow-lg w-full max-w-3xl max-h-[100vh] overflow-y-auto">
            <div class="flex justify-between items-center px-6 py-3 border-b">
                <h2 class="text-lg font-medium">Details de Commande N <span class="text-gray-600">FGT875</span></h2>
                <button onclick="closeModalDetails()" class="text-gray-500 hover:text-gray-900">
                    <i class="text-2xl ri-close-line"></i>
                </button>
            </div>

            <div class="px-6 py-2 my-1">
                <p class="text-gray-800">Date de commande: 14 Avril, 2025</p>
            </div>

            <div class="grid grid-cols-6 gap-5 px-6">
                <div class="col-span-4">
                    <div class="mb-5">
                        <div class="bg-[#f5f5f566] p-1 mb-3">
                            <h5 class="text-gray-900">INFORMATION DU PRODUIT</h5>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <div class="text-left">
                                <p class="mb-1">Smartphone XYZ Pro Max</p>
                                <p class="mb-2 text-sm text-gray-600">Modèle: SM-12345 | Couleur: Noir</p>
                            </div>
                            <div class="text-right">
                                <p class="mb-1">6065.00 DH</p>
                                <p class="mb-2 text-sm text-gray-600">Quantité : 1</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="grid grid-cols-4 gap-5 justify-between">
                                <div class="col-span-2">
                                    <h6 class="mb-2">Details de paiement</h6>
                                    <div class="space-y-2">
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Prix unitaire:</span>
                                            <span class="text-sm">6500.00 DH</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Remise 5 %</span>
                                            <span class="text-sm text-red-700">- 325.00 DH</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Escompte 2 %</span>
                                            <span class="text-sm text-red-700">- 130.00 DH</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Livraison</span>
                                            <span class="text-red-700">- 50.00 DH</span>
                                        </div>
                                        <div class="flex justify-between pt-1 border-t">
                                            <span class="text-sm text-gray-600">Montant à payer</span>
                                            <span class="text-sm">6045.00 DH</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-span-2 justify-self-end">
                                    <h6 class="mb-2">Méthode de paiement</h6>
                                    <p class="text-sm text-gray-600">Paiement à la livraison</p>
                                    <p class="mt-2 text-sm text-green-700">Payé le 02/04/2025</p>
                                    <p class="hidden text-sm text-red-700">Pas encore payé</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="bg-[#f5f5f566] p-1 mb-3">
                        <h5 class="text-gray-900">INFORMATION DU CLIENT</h5>
                    </div>

                    <div class="space-y-3">
                        <div>
                            <p class="mb-1">Nom Complet</p>
                            <p class="mb-2 text-sm text-gray-600">Mohammed Alaoui</p>
                        </div>

                        <div>
                            <p class="mb-1">Téléphone</p>
                            <p class="mb-2 text-sm text-gray-600">06 12 34 56 78</p>
                        </div>

                        <div>
                            <p class="mb-1">Email</p>
                            <p class="mb-2 text-sm text-gray-600">m.alaoui@exemple.com</p>
                        </div>

                        <div>
                            <p class="mb-1">Adresse de livraison</p>
                            <p class="mb-2 text-sm text-gray-600">123 Rue Hassan II, Quartier Maarif, Casablanca, 20100</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-3 mt-2 mb-4">
                <div class="bg-[#f5f5f566] py-1 px-3 mb-3">
                    <h5 class="text-gray-900">INFORMATION DE LIVRAISON</h5>
                </div>

                <div class="grid grid-cols-3 gap-5">
                    <div>
                        <p class="mb-1">Entreprise de Livraison</p>
                        <p class="mb-2 text-sm text-gray-600">ATP Transport</p>

                        <p class="mb-1">Nom du Livreur</p>
                        <p class="text-sm text-gray-600">Ahmed Benjelloun</p>
                    </div>

                    <div>
                        <p class="mb-1">Email</p>
                        <p class="mb-2 text-sm text-gray-600">m.alami@atp.ma</p>

                        <p class="mb-1">Téléphone</p>
                        <p class="text-sm text-gray-600">07 45 78 23 90</p>
                    </div>

                    <div>
                        <p class="mb-1">Statut de Livraison</p>
                        <div class="flex items-center">
                            <span class="mr-2 w-2.5 h-2.5 bg-green-700 rounded-full"></span>
                            <span class="mb-2 text-sm text-gray-600">En route</span>
                        </div>

                        <p class="mb-1">Date de livraison estimée</p>
                        <p class="text-sm text-gray-600">16 Avril, 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ----------------- Modal 2 pour Details des commandes: Avant assigne a un Livreur -------------------------- --}}
    <div id="detailsModal2" class="hidden fixed inset-0 z-50 justify-center items-center p-4 bg-black bg-opacity-50">
        <div class="bg-white rounded-md shadow-lg w-full max-w-3xl max-h-[100vh] overflow-y-auto">
            <div class="flex justify-between items-center px-6 py-3 border-b">
                <h2 class="text-lg font-medium">Details de Commande N <span class="text-gray-600">FGT875</span></h2>
                <button onclick="closeModalDetails2()" class="text-gray-500 hover:text-gray-900">
                    <i class="text-2xl ri-close-line"></i>
                </button>
            </div>

            <div class="px-6 py-2 my-1">
                <p class="text-gray-800">Date de commande: 14 Avril, 2025</p>
            </div>

            <div class="grid grid-cols-6 gap-5 px-6">
                <div class="col-span-4">
                    <div class="mb-5">
                        <div class="bg-[#f5f5f566] p-1 mb-3">
                            <h5 class="text-gray-900">INFORMATION DU PRODUIT</h5>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <div class="text-left">
                                <p class="mb-1">Smartphone XYZ Pro Max</p>
                                <p class="mb-2 text-sm text-gray-600">Modèle: SM-12345 | Couleur: Noir</p>
                            </div>
                            <div class="text-right">
                                <p class="mb-1">6065.00 DH</p>
                                <p class="mb-2 text-sm text-gray-600">Quantité : 1</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="grid grid-cols-4 gap-5 justify-between">
                                <div class="col-span-2">
                                    <h6 class="mb-2">Details de paiement</h6>
                                    <div class="space-y-2">
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Prix unitaire:</span>
                                            <span class="text-sm">6500.00 DH</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Remise 5 %</span>
                                            <span class="text-sm text-red-700">- 325.00 DH</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Escompte 2 %</span>
                                            <span class="text-sm text-red-700">- 130.00 DH</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Livraison</span>
                                            <span class="text-red-700">- 50.00 DH</span>
                                        </div>
                                        <div class="flex justify-between pt-1 border-t">
                                            <span class="text-sm text-gray-600">Total à payer</span>
                                            <span class="text-sm">6045.00 DH</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 justify-self-end">
                                    <h6 class="mb-2">Méthode de paiement</h6>
                                    <p class="text-sm text-gray-600">Paiement à la livraison</p>
                                    <p class="hidden mt-2 text-sm text-green-700">Payé le 02/04/2025</p>
                                    <p class="mt-2 text-sm text-red-700">Pas encore payé</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="bg-[#f5f5f566] p-1 mb-3">
                        <h5 class="text-gray-900">INFORMATION DU CLIENT</h5>
                    </div>

                    <div class="space-y-3">
                        <div>
                            <p class="mb-1">Nom Complet</p>
                            <p class="mb-2 text-sm text-gray-600">Mohammed Alaoui</p>
                        </div>

                        <div>
                            <p class="mb-1">Téléphone</p>
                            <p class="mb-2 text-sm text-gray-600">06 12 34 56 78</p>
                        </div>

                        <div>
                            <p class="mb-1">Email</p>
                            <p class="mb-2 text-sm text-gray-600">m.alaoui@exemple.com</p>
                        </div>

                        <div>
                            <p class="mb-1">Adresse de livraison</p>
                            <p class="mb-2 text-sm text-gray-600">123 Rue Hassan II, Quartier Maarif, Casablanca, 20100</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-3 mt-2 mb-4">
                <div class="bg-[#f5f5f566] py-1 px-3 mb-3">
                    <h5 class="text-gray-900">INFORMATION DE LIVRAISON</h5>
                </div>

                <div>
                    <select
                        class="px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        <option value="">Sélectionnez un livreur</option>
                        <option value="1">Ahmed Benjelloun - ATP Transport</option>
                        <option value="2">Karim Tazi - Amana Express</option>
                        <option value="3">Younes Alami - Chronopost</option>
                        <option value="4">Rachid Mansouri - DHL Maroc</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end px-6 py-4 space-x-3 border-t">
                <button onclick="closeModalDetails2()"
                    class="px-4 py-2 text-gray-900 bg-gray-100 rounded-md hover:bg-gray-200">
                    Annuler
                </button>
                <button
                    class="px-4 py-2 text-white bg-gradient-to-b from-gray-900 to-gray-950 rounded-md hover:from-gray-950 hover:to-black">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const detailsModal = document.getElementById('detailsModal');

        function openModalDetails() {
            detailsModal.classList.remove('hidden');
            detailsModal.classList.add('flex');
        }

        function closeModalDetails() {
            detailsModal.classList.remove('flex');
            detailsModal.classList.add('hidden');
        }

        const detailsModal2 = document.getElementById('detailsModal2');

        function openModalDetails2() {
            detailsModal2.classList.remove('hidden');
            detailsModal2.classList.add('flex');
        }

        function closeModalDetails2() {
            detailsModal2.classList.remove('flex');
            detailsModal2.classList.add('hidden');
        }
        const commandeModal = document.getElementById('commandeModal');

        function openModalCommande() {
            commandeModal.classList.remove('hidden');
            commandeModal.classList.add('flex');
        }

        function closeModalCommande() {
            commandeModal.classList.remove('flex');
            commandeModal.classList.add('hidden');
        }

        let reductionCounter = 0;

        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            const icon = document.getElementById(sectionId + 'Icon');

            section.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function ajouterReduction() {
            const reductionFields = document.getElementById('reductionFields');
            const reductionId = 'reduction-' + reductionCounter;
            reductionCounter++;

            const reductionGroup = document.createElement('div');
            reductionGroup.id = reductionId;
            reductionGroup.className = 'grid grid-cols-1 md:grid-cols-2 gap-4 mb-4';

            reductionGroup.innerHTML = `
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-900">Nom de Réduction</label>
        <input type="text" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow" placeholder="Nom de la réduction">
      </div>
      <div>
        <label class="block flex justify-between mb-1 text-sm font-medium text-gray-900">
          Montant du Réduction
          <button type="button" onclick="supprimerReduction('${reductionId}')" class="text-gray-500 hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
          </button>
        </label>
        <input type="number" class="px-4 py-2 w-full text-sm text-gray-600 bg-transparent rounded-md border border-gray-200 shadow-sm transition duration-300 placeholder:text-gray-400 ease focus:outline-none focus:border-gray-400 hover:border-gray-300 focus:shadow" placeholder="Montant de la réduction">
      </div>
    `;

            reductionFields.appendChild(reductionGroup);
            reductionFields.classList.remove('hidden');
        }

        function supprimerReduction(reductionId) {
            const reductionElement = document.getElementById(reductionId);
            if (reductionElement) {
                reductionElement.remove();
            }
        }
    </script>
@endsection
