<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Utilisateur;
use App\Models\Livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\sendEmail;

class CommandesController extends Controller
{
   public function viewCommandesLivreurPage()
   {
      $commandes = Commande::with(['client.utilisateur'])->latest()->get();
      return view("dashboard/livreur/commandes", compact('commandes'));
   }

   public function viewCommandesAdminPage()
   {
      $commandes = Commande::with(['client.utilisateur'])->latest()->get();
      $livreurs = Livreur::with('utilisateur')->get();
      return view("dashboard/admin/commandes", compact('commandes', 'livreurs'));
   }

   public function ajouteCommande(Request $request)
   {
       $request->validate([
           'nom_complet' => 'required|string',
           'telephone' => 'required',
           'email' => 'required|email',
           'ville' => 'required|string',
           'adresse' => 'required|string',
           'nom_produit' => 'required|string',
           'details_produit' => 'nullable|string',
           'quantite' => 'required|integer|min:1',
           'prix' => 'required|numeric',
           'paiement_type' => 'required|in:a_la_livraison,en_ligne',
           'paiement_status' => 'required|boolean',
       ]);

       $utilisateur = Utilisateur::where('email', $request->email)->first();
       $is_new_account = false;
       $password = null;

       if (!$utilisateur) {
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

           Client::create([
               'id' => $utilisateur->id
           ]);

           $is_new_account = true;
       } else {
           if ($utilisateur->role !== 'client') {
               return redirect()->route('admin.commandes')->with('error', 'Cet email est déjà utilisé par un administrateur ou un livreur.');
           }
       }

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
           'id_client' => $utilisateur->id,
       ]);

       Mail::to($request->email)->send(new sendEmail(
           $request->nom_complet,
           $request->email,
           $password,
           $commandeNumber,
           $request->nom_produit,
           $request->quantite,
           $total,
           $is_new_account
       ));

       $message = $is_new_account 
           ? 'Commande créée avec succès. Les informations de connexion ont été envoyées à l\'email du client.'
           : 'Commande créée avec succès. Une confirmation a été envoyée à l\'email du client.';

       return redirect()->route('admin.commandes')->with('success', $message);
   }

   public function assignerLivreur(Request $request, $id)
   {
       $request->validate([
           'livreur_id' => 'required|exists:livreurs,id'
       ]);

       try {
           $commande = Commande::findOrFail($id);
           $commande->id_livreur = $request->livreur_id;
           $commande->save();

           return redirect()->route('admin.commandes')
               ->with('success', 'Livreur assigné avec succès à la commande.');
       } catch (\Exception $e) {
           return redirect()->route('admin.commandes')
               ->with('error', 'Une erreur est survenue lors de l\'assignation.');
       }
   }
}
