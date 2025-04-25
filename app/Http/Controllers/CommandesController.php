<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommandesController extends Controller
{
   public function viewCommandesLivreurPage()
   {
      return view("dashboard/livreur/commandes");
   }

   public function viewCommandesAdminPage()
   {
     return view("dashboard/admin/commandes");
   }

   public function ajouteCommande(Request $request)
   {
       $request->validate([
           'nom_complet' => 'required|string',
           'telephone' => 'required',
           'email' => 'required|email|unique:utilisateurs',
           'ville' => 'required|string',
           'adresse' => 'required|string',
           'nom_produit' => 'required|string',
           'details_produit' => 'nullable|string',
           'quantite' => 'required|integer|min:1',
           'prix' => 'required|numeric',
           'paiement_type' => 'required|in:a_la_livraison,en_ligne',
           'paiement_status' => 'required|boolean',
           'reductions' => 'nullable|array',
           'reductions.*.nom' => 'required|string',
           'reductions.*.montant' => 'required|numeric',
       ]);

       $password = Str::random(8) . rand(10, 99) . '!@';

       $utilisateur = Utilisateur::create([
           'name' => $request->nom_complet,
           'email' => $request->email,
           'password' => Hash::make($password),
           'role' => 'client',
           'phone' => $request->telephone,
           'ville' => $request->ville,
           'adresse' => $request->adresse,
       ]);

       $client = Client::create([
           'id' => $utilisateur->id
       ]);

       $commandeNumber = 'CMD' . rand(10000, 99999);

       $total = $request->prix * $request->quantite;

       $commande = Commande::create([
           'commande_number' => $commandeNumber,
           'nom_produit' => $request->nom_produit,
           'details_produit' => $request->details_produit,
           'quantite' => $request->quantite,
           'prix' => $request->prix,
           'total_a_payer' => $total,
           'paiement_type' => $request->paiement_type,
           'paiement_status' => $request->paiement_status,
           'id_client' => $client->id,
       ]);


       return redirect()->route('admin.commandes')->with('success', 'Commande créée avec succès.');
   }
}
