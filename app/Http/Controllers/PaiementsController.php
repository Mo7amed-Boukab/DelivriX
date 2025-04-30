<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaiementsController extends Controller
{
   public function viewPaiementLivreurPage()
   {
        $colis = Colis::with(['commande.client.utilisateur'])->whereHas('commande', function ($condition) {
            $condition->where('paiement_status', 0);
        })->get();

        $paiements = Paiement::with('colis.commande.client.utilisateur')->get();
       return view('dashboard.livreur.paiements',compact('colis','paiements'));
   }

   public function ajoutePaiement(Request $request)
   {  
          $paiement = $request->validate([
           'id_colie' => 'required|exists:colies,id',
           'date_paiement' => 'required|date',
           'details' => 'string|nullable'
          ]);
           $colie = Colis::findOrFail($request->id_colie);
           
           $dateColie = Carbon::parse($colie->date_creation);
           $datePaiement = Carbon::parse($request->date_paiement);
    
           if ( $datePaiement <= $dateColie) {
            return redirect()->back()
            ->with('error', 'La date de paiement doit être supérieure à la date de création du colis');
          }
       try {   
           $montantPaiement = $colie->commande->total_a_payer;
           $paiement['montant'] = $montantPaiement;
           Paiement::create($paiement);

           $colie->commande->paiement_status = 1;
           $colie->commande->save();
           return redirect()->back()->with('success', 'Paiement ajouté avec succès');

       } catch (\Exception $e) {
           return redirect()->back()
               ->with('error', 'Une erreur est survenue lors de l\'ajout du paiement')
               ->withInput();
       }
   }
   
}
