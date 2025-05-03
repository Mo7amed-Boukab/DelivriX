<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Colis;
use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

     $today = Carbon::today();
     $startOfMonth = Carbon::now()->startOfMonth();
 
     $todayRevenue = Commande::whereDate('date_commande', $today)->where('paiement_status', 1)->sum('total_a_payer');
     $monthlyRevenue = Commande::whereBetween('date_commande', [$startOfMonth, Carbon::now()])
         ->where('paiement_status', 1)
         ->sum('total_a_payer');
 
     $todayTotalOrders = Commande::whereDate('date_commande', $today)->count();
     $monthlyTotalOrders = Commande::whereBetween('date_commande', [$startOfMonth, Carbon::now()])->count();


     $todayDeliveredOrders = Colis::where('statut', 'livree')->whereDate('date_arrivee', $today)->count();
     $monthlyDeliveredOrders = Colis::where('statut', 'livree')->whereBetween('date_arrivee', [$startOfMonth, Carbon::now()])->count();
 
 
     $todayOrdersInDelivery = Colis::where('statut', 'en_route')->count();
     $monthlyOrdersInDelivery = Colis::whereBetween('date_sortie', [$startOfMonth, Carbon::now()])->where('statut', 'en_route')->count();
 
 
 
       return view("dashboard/admin/index", compact('todayRevenue','monthlyRevenue','todayTotalOrders','monthlyTotalOrders','todayDeliveredOrders','monthlyDeliveredOrders','todayOrdersInDelivery','monthlyOrdersInDelivery'));
    }

    public function viewClientPage()
   {
    $clients = Client::with('utilisateur')->get();
    return view("dashboard/admin/clients", compact('clients'));
   }
}
