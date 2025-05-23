<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendrieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ColieController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PaiementsController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginPage'])->middleware('guest')->name('login.page');
Route::get('/register', [AuthController::class, 'showRegisterPage'])->middleware('guest')->name('register.page');

Route::post('/login', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
 Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
 Route::get('/commandes', [CommandesController::class, 'viewCommandesAdminPage'])->name('admin.commandes');
 Route::post('/commandes', [CommandesController::class, 'ajouteCommande'])->name('admin.commandes.store');
 Route::post('/commandes/{id}/assigner-livreur', [CommandesController::class, 'assignerLivreur'])->name('admin.commandes.assigner-livreur');
 Route::get('/livraison', [LivraisonController::class, 'viewLivraisonPage'])->name('admin.livraison');
 Route::post('/livraison', [LivraisonController::class, 'ajouteLivreur'])->name('admin.livraison.store');
 Route::delete('/livraison/delete/{id}', [LivraisonController::class, 'deleteLivreur'])->name('admin.livraison.delete');
 Route::get('/clients', [AdminController::class, 'viewClientPage'])->name('admin.clients');
 Route::get('/paiements', [PaiementsController::class, 'viewPaiementAdminPage'])->name('admin.paiements');
 Route::get('/notifications', [NotificationsController::class, 'viewNotificationsAdminPage'])->name('admin.notifications');
 Route::post('/notifications/{id}/lu', [NotificationsController::class, 'lireNotification'])->name('admin.notifications.lu');
 Route::post('/notifications/all-lu', [NotificationsController::class, 'lireToutesNotifications'])->name('admin.notifications.all-lu');
});

Route::middleware(['auth', 'isLivreur'])->prefix('livreur')->group(function () {
 Route::get('/dashboard', [LivreurController::class, 'index'])->name('livreur.dashboard');
Route::get('/commandes', [CommandesController::class, 'viewCommandesLivreurPage'])->name('livreur.commandes');
Route::post('/commandes/{commande}/accepter', [CommandesController::class, 'accepterLivraison'])->name('commandes.accepter');
Route::post('/commandes/{commande}/refuser', [CommandesController::class, 'refuserLivraison'])->name('commandes.refuser');
Route::get('/colis', [ColieController::class, 'viewColisPage'])->name('livreur.colis');
Route::post('/colis/ajouter', [ColieController::class, 'ajouteColis'])->name('colis.store');
Route::put('/colis/{colis}/update-status', [ColieController::class, 'updateColieStatus'])->name('colis.update-status');
Route::get('/calendrie', [CalendrieController::class, 'viewCalendriePage'])->name('livreur.calendrie');
Route::post('/calendrie/rendez-vous', [CalendrieController::class, 'ajouteRendezVous'])->name('livreur.rendez-vous.store');
Route::get('/paiements', [PaiementsController::class, 'viewPaiementLivreurPage'])->name('livreur.paiements');
Route::post('/paiements/ajouter', [PaiementsController::class, 'ajoutePaiement'])->name('livreur.paiements.store');
Route::get('/notifications', [NotificationsController::class, 'viewNotificationsLivreurPage'])->name('livreur.notifications');
Route::post('/notifications/{id}/lu', [NotificationsController::class, 'lireNotification'])->name('livreur.notifications.lu');
Route::post('/notifications/all-lu', [NotificationsController::class, 'lireToutesNotifications'])->name('livreur.notifications.all-lu');

Route::get('/profile', [ProfileController::class, 'viewProfileLivreurPage'])->name('livreur.profile');
Route::put('/profile-update-info', [ProfileController::class, 'updateLivreurProfile'])->name('livreur.profile.update');
Route::put('/profile/update-pass', [ProfileController::class, 'updatePassword'])->name('livreur.profile.password');
Route::put('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('livreur.profile.photo');
});

Route::middleware(['auth', 'isClient'])->prefix('client')->group(function () {
 Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
 Route::get('/notifications', [NotificationsController::class, 'viewNotificationsClientPage'])->name('client.notifications');
 Route::post('/notifications/{id}/lu', [NotificationsController::class, 'lireNotification'])->name('client.notifications.lu');
 Route::post('/notifications/all-lu', [NotificationsController::class, 'lireToutesNotifications'])->name('client.notifications.all-lu');

 Route::get('/profile', [ProfileController::class, 'viewProfileClientPage'])->name('client.profile');
 Route::put('/profile/update-info', [ProfileController::class, 'updateClientProfile'])->name('client.profile.update');
Route::put('/profiile/update-pass', [ProfileController::class, 'updatePassword'])->name('client.profile.password');
Route::put('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('client.profile.photo');
Route::get('/recherche', [ClientController::class, 'rechercherColier'])->name('colis.recherche');
Route::get('/colis/{id}/pdf', [ClientController::class, 'downloadColisPdf'])->name('colis.pdf');
});

Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');


