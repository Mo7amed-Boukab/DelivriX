<?php

namespace App\Http\Controllers;

use App\Models\Colis;
use App\Models\Paiement;
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
            'montant' => 'required|numeric|min:0',
            'details' => 'required|nullable'
           ]);
       try {   
           $paiement = Paiement::create($paiement);
           $colis = Colis::findOrFail($request->id_colie);
           $colis->commande->paiement_status = 1;
           $colis->commande->save();
           return redirect()->back()->with('success', 'Paiement ajouté avec succès');

       } catch (\Exception $e) {
           return redirect()->back()
               ->with('error', 'Une erreur est survenue lors de l\'ajout du paiement')
               ->withInput();
       }
   }
   
}
