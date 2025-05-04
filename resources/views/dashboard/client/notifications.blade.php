@extends('layout.master')
@section('main')
    <main class="px-4 pt-24 mx-auto w-full bg-white sm:px-6 lg:px-20">

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
                    <form action="{{ route('client.notifications.all-lu') }}" method="POST">
                        @csrf
                        <button class="flex gap-2 justify-center items-center px-4 py-2 w-full text-sm font-medium text-white bg-gradient-to-b from-gray-900 rounded-md transition-colors sm:w-auto to-gray-950 hover:from-gray-950 hover:to-black">
                            <i class="fas fa-check-double"></i>
                            Tout marquer comme lu
                        </button>
                    </form>
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
                                <form action="{{ route('client.notifications.lu', $notification->id) }}" method="POST">
                                    @csrf
                                    <button class="text-sm text-gray-600 hover:text-gray-900">
                                        <i class="mr-1 fas fa-check"></i>
                                        Marquer comme lu
                                    </button>
                                </form>
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
    </main>
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
