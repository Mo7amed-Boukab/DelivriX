@extends('layout.master')
@section('main')
    <div class="w-full md:w-[calc(100%-260px)] px-5 flex-1 overflow-auto">
        <header class="flex justify-between items-center p-4 mt-2">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Tableau de bord</h1>
                <p class="text-sm text-gray-500">Lun, 24 Mar, 2025, 11:30 AM</p>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="notificationButton" class="relative p-2 text-gray-500 hover:text-gray-700"
                        onclick="toggleNotificationModal()">
                        <i class="text-xl fas fa-bell"></i>
                        @if ($notifications && $notifications->count() > 0)
                            <span
                                class="absolute top-0 right-0 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-[10px] text-white">{{ $notifications->count() }}</span>
                        @endif
                    </button>
                    {{-- ----------------------------------- modal notifications -------------------------------- --}}
                    <div id="notificationModal"
                        class="hidden overflow-hidden absolute right-0 z-50 mt-2 w-80 bg-white rounded-md shadow-lg"
                        style="max-height: 400px; overflow-y: auto;">
                        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h3 class="text-sm font-semibold text-gray-800">Notifications</h3>
                                <a href="{{ route('admin.notifications') }}"
                                    class="text-xs font-medium text-gray-700 hover:text-black">Voir tout</a>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-100">
                            @if ($notifications && $notifications->count() > 0)
                                @foreach ($notifications as $notification)
                                    <div class="px-4 py-3 transition duration-150 ease-in-out hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900">{{ $notification->titre }}</p>
                                                <p class="text-xs text-gray-500 truncate">{{ $notification->message }}</p>
                                                <p class="mt-1 text-xs text-gray-400">
                                                    {{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="px-4 py-6 text-center">
                                    <p class="text-sm text-gray-500">Aucune notification</p>
                                </div>
                            @endif
                        </div>
                        @if ($notifications && $notifications->count() > 0)
                            <div class="p-2 bg-gray-50 border-t border-gray-100">
                                <form action="{{ route('admin.notifications.all-lu') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-2 w-full text-xs font-medium text-center bg-gradient-to-b from-gray-100 to-gray-200 rounded border border-gray-200 text-gray-950 hover:from-gray-200 hover:to-gray-300">
                                        Tout marquer comme lu
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex gap-3 items-center">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-medium">{{ $user->name }}</p>
                        <p class="text-xs text-gray-500">Administrateur</p>
                    </div>
                    <div class="overflow-hidden w-10 h-10 bg-gray-200 rounded-full">
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="profile" />
                    </div>
                </div>
            </div>
        </header>
        {{--  ----------------------------------- Statistiques ------------------------------------ --}}
        <div class="grid grid-cols-1 gap-4 my-6 mt-6 mb-10 md:grid-cols-2 lg:grid-cols-4 md:gap-6">
            <div class="p-5 bg-white rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600">Commande livrée</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
                </div>
                <div class="mb-4 h-px bg-gray-200"></div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-2xl font-bold">{{ $todayDeliveredOrders }}</span>
                    <span class="flex items-center text-sm text-green-700">
                        <i class="mr-1 fas fa-arrow-up"></i>2.5%
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ $monthlyDeliveredOrders }} commande</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
                </div>
            </div>

            <div class="p-5 bg-white rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600">Commande en Livraison</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
                </div>
                <div class="mb-4 h-px bg-gray-200"></div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-2xl font-bold">{{ $todayOrdersInDelivery }}</span>
                    <span class="flex items-center text-sm text-green-700">
                        <i class="mr-1 fas fa-arrow-up"></i>2.5%
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ $monthlyOrdersInDelivery }} commande</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
                </div>
            </div>

            <div class="p-5 bg-white rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600">Total Commande</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
                </div>
                <div class="mb-4 h-px bg-gray-200"></div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-2xl font-bold">{{ $todayTotalOrders }}</span>
                    <span class="flex items-center text-sm text-green-700">
                        <i class="mr-1 fas fa-arrow-up"></i>2.5%
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ $monthlyTotalOrders }} commande</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
                </div>
            </div>

            <div class="p-5 bg-white rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600">Total Revenus</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">Aujourd'hui</span>
                </div>
                <div class="mb-4 h-px bg-gray-200"></div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-2xl font-bold">{{ number_format($todayRevenue, 2) }} DH</span>
                    <span class="flex items-center text-sm text-green-700">
                        <i class="mr-1 fas fa-arrow-up"></i>2.5%
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ number_format($monthlyRevenue, 2) }} DH</span>
                    <span class="px-2 py-1 text-xs bg-gray-100 rounded">ce-mois-ci</span>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-6 md:flex-row">
            <div class="p-6 w-full bg-white rounded-lg shadow md:w-1/2">
                <h2 class="mb-6 font-medium text-gray-700">Répartition des revenus par ville</h2>
                <div class="flex flex-col justify-center items-center">
                    <div class="relative w-48 h-48">
                        <canvas id="doughnutChart"></canvas>
                        <div class="flex absolute inset-0 flex-col justify-center items-center">
                            <span class="text-sm text-gray-500">Total Revenus</span>
                            <span class="text-2xl font-bold text-gray-800">58000 dh</span>
                        </div>
                    </div>

                    <div class="flex gap-8 justify-center items-center mt-6 w-full">
                        <div class="flex items-center">
                            <span class="inline-block mr-2 w-4 h-4 bg-black rounded-full"></span>
                            <span class="mr-2 text-gray-600">Casablanca</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block mr-2 w-4 h-4 bg-gray-500 rounded-full"></span>
                            <span class="mr-2 text-gray-600">Rabat</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block mr-2 w-4 h-4 bg-gray-300 rounded-full"></span>
                            <span class="mr-2 text-gray-600">Nador</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 w-full bg-white rounded-lg shadow md:w-1/2">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-medium text-gray-700">Evolutions des commandes</h2>
                    <div class="flex gap-2">
                        <button class="px-4 py-1 text-sm text-gray-600 rounded-full">jours</button>
                        <button class="px-4 py-1 text-sm text-gray-600 rounded-full">mois</button>
                        <button class="px-4 py-1 text-sm text-white bg-black rounded-full">Années</button>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
    @endsection

    @section('toast')
        @if (session('success'))
            <div id="toast-success"
                class="flex fixed top-6 right-6 z-50 items-center p-4 max-w-xs bg-white rounded-lg border border-gray-200 shadow-lg animate-fade-in">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                            fill="none" />
                        <path d="M9 12l2 2l4 -4" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="ml-3 text-sm font-medium text-gray-900">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="inline-flex p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-gray-400 bg-white rounded-lg hover:text-gray-600 focus:ring-2 focus:ring-gray-100">
                    <span class="sr-only">Fermer</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div id="toast-error"
                class="flex fixed top-6 right-6 z-50 items-center p-4 max-w-xs bg-white rounded-lg border border-gray-200 shadow-lg animate-fade-in">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                            fill="none" />
                        <path d="M15 9l-6 6M9 9l6 6" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="ml-3 text-sm font-medium text-gray-900">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="inline-flex p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-gray-400 bg-white rounded-lg hover:text-gray-600 focus:ring-2 focus:ring-gray-100">
                    <span class="sr-only">Fermer</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div id="toast"
                class="flex fixed top-6 right-6 z-50 items-center p-4 max-w-xs bg-white rounded-lg border border-gray-200 shadow-lg animate-fade-in">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                            fill="none" />
                        <path d="M15 9l-6 6M9 9l6 6" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="ml-3 text-sm font-medium text-gray-900">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
                <button type="button" onclick="this.parentElement.remove()"
                    class="inline-flex p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-gray-400 bg-white rounded-lg hover:text-gray-600 focus:ring-2 focus:ring-gray-100">
                    <span class="sr-only">Fermer</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif
    @endsection

    @section('script')
        <script>
            function toggleNotificationModal() {
                const modal = document.getElementById('notificationModal');
                modal.classList.toggle('hidden');
            }

            setTimeout(() => {
                document.querySelectorAll('[id^="toast-"]').forEach(el => el.style.display = 'none');
            }, 3000);

            const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
            const doughnutChart = new Chart(doughnutCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Casablanca', 'Rabat', 'Nador'],
                    datasets: [{
                        data: [50, 30, 20],
                        backgroundColor: ['#000000', '#808080', '#D3D3D3'],
                        borderWidth: 0,
                        cutout: '75%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });

            const lineCtx = document.getElementById('lineChart').getContext('2d');
            const lineChart = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                    datasets: [{
                        label: 'Commandes',
                        data: [200, 300, 250, 200, 380, 350, 450, 400, 320, 250, 220, 300],
                        borderColor: '#000000',
                        borderWidth: 1,
                        backgroundColor: 'rgba(0, 0, 0, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            min: 0,
                            max: 500,
                            ticks: {
                                stepSize: 100,
                                callback: function(value) {
                                    return value;
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    }
                }
            });
        </script>
    @endsection