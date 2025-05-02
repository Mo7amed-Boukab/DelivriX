<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Colis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColieController extends Controller
{
   public function viewColisPage()
   {
       $livreur = Auth::user()->livreur;
       $commandes = Commande::where('livraison_statut', 'accepter')->where('id_livreur', $livreur->id)->whereDoesntHave('colis')->get();
       $colis = Colis::where('id_livreur', $livreur->id)->with(['commande.client.utilisateur'])->get();

       return view('dashboard.livreur.colis', compact('commandes', 'colis'));
   }

   public function ajouteColis(Request $request)
   {
       $request->validate([
           'commande_id' => 'required|exists:commandes,id',
           'poids' => 'required|numeric|min:0',
           'hauteur' => 'required|numeric|min:0',
           'longueur' => 'required|numeric|min:0',
           'largeur' => 'required|numeric|min:0',
       ]);

       try {
           Commande::findOrFail($request->commande_id);
           
           $colisNumber = 'CLS-' . rand(10000, 99999);
           $livreur = Auth::user()->livreur;

           Colis::create([
               'colie_number' => $colisNumber,
               'poids' => $request->poids,
               'longueur' => $request->longueur,
               'largeur' => $request->largeur,
               'hauteur' => $request->hauteur,
               'statut' => 'en_preparation',
               'id_commande' => $request->commande_id,
               'id_livreur' => $livreur->id
           ]);

           return redirect()->route('livreur.colis')
               ->with('success', 'Colis ajouté avec succès à la commande.');
       } catch (\Exception $e) {
           return redirect()->route('livreur.colis')
               ->with('error', 'Une erreur est survenue lors de l\'ajout du colis.');
       }
   }  

   public function updateColieStatus(Request $request, Colis $colis)
  {
     $request->validate([
         'colisStatut' => 'required|in:en_preparation,en_route,livree',
     ]);

     $colis->update([
         'statut' => $request->colisStatut
     ]);
     if($request->colisStatut === "livree"){
        $colis->commande->commande_statut = "livree";
        $colis->commande->save();
     }

        return redirect()->route('livreur.colis')->with('success', 'Colis Modifier avec succès.');

   }
}