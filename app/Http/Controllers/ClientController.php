<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientController extends Controller
{
    public function index(){
       $user = Auth::user();
       $today = Carbon::now()->locale('fr_FR');
       $colis = null;
       return view("dashboard.client.index", compact('user','today','colis'));
   }

   public function rechercherColier(Request $request)
   {
       $colieNumber = $request->input('colieNumber', '');
       $user = Auth::user();
       $today = Carbon::now()->locale('fr_FR');

       
       $colis = null;
       if (!empty($colieNumber)) {
        
           $colis = Colis::where('colie_number', $colieNumber)->with(['commande.client.utilisateur'])->first();
       }
       
       return view("dashboard.client.index", compact('colis', 'user', 'today','colieNumber'));
   }

   public function downloadColisPdf($id)
   {
       $colis = Colis::with(['commande.client.utilisateur', 'commande.livreur.utilisateur'])->findOrFail($id);
           
       $pdf = PDF::loadView('dashboard.client.colis-pdf', compact('colis'));
       
       return $pdf->download('colis-' . $colis->colie_number . '.pdf');
   }
}
