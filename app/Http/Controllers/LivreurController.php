<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivreurController extends Controller
{
   public function index(){
    $livreur = Auth::user()->livreur;
    $today = Carbon::today();
    $startOfMonth = Carbon::now()->startOfMonth();

    $todayRevenue = Commande::where('id_livreur', $livreur->id)->whereDate('date_commande', $today)
        ->where('paiement_status', 1)
        ->sum('total_a_payer');

    $monthlyRevenue = Commande::where('id_livreur', $livreur->id)->whereBetween('date_commande', [$startOfMonth, Carbon::now()])
        ->where('paiement_status', 1)
        ->sum('total_a_payer');


    $todayDeliveredColis = Colis::where('id_livreur', $livreur->id)->where('statut', 'livree')
        ->whereDate('date_arrivee', $today)
        ->count();

    $monthlyDeliveredColis = Colis::where('id_livreur', $livreur->id)->whereBetween('date_arrivee', [$startOfMonth, Carbon::now()])
       ->where('statut', 'livree')
       ->count();


    $todayColisInDelivery = Colis::where('id_livreur', $livreur->id)->where('statut', 'en_route')->count();

    $monthlyColisInDelivery = Colis::where('id_livreur', $livreur->id)->whereBetween('date_sortie', [$startOfMonth, Carbon::now()])
    ->where('statut', 'en_route')
    ->count();


    $todayTotalOrders = Commande::where('id_livreur', $livreur->id)->whereDate('date_commande', $today)->count();

    $monthlyTotalOrders = Commande::where('id_livreur', $livreur->id)
       ->whereBetween('date_commande', [$startOfMonth, Carbon::now()])
       ->count();

       return view("dashboard/livreur/index", compact('todayRevenue','monthlyRevenue','todayDeliveredColis', 'monthlyDeliveredColis', 'todayColisInDelivery', 'monthlyColisInDelivery', 'todayTotalOrders', 'monthlyTotalOrders'));
  }
}
