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
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class CommandesController extends Controller
{
   public function viewCommandesLivreurPage()
   {
      $livreurId = Auth::user()->livreur->id;   
      $commandes = Commande::where('id_livreur', $livreurId)->with(['client.utilisateur'])->latest()->get();
      return view("dashboard/livreur/commandes", compact('commandes'));
   }

   public function viewCommandesAdminPage()
   {   
      $commandes = Commande::with(['client.utilisateur'])->latest()->get();
      $livreurs = Livreur::where('statut','disponible')->with('utilisateur')->get();
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
           'id_admin' => Auth::id()
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
           $commande->livraison_statut = "en_attente";
           $commande->save();

           $adminName = Auth::user()->name;
           $commandeNumber = $commande->commande_number;
            Notification::create([
             'titre' => "Nouvelle commande reçue",
             'message' => "Commande $commandeNumber assigné par '$adminName'",
             'id_utilisateur' => $request->livreur_id ,
            ]);

           return redirect()->route('admin.commandes')
               ->with('success', 'Livreur assigné avec succès à la commande.');
       } catch (\Exception $e) {
           return redirect()->route('admin.commandes')
               ->with('error', 'Une erreur est survenue lors de l\'assignation.');
       }
   }

   public function accepterLivraison(Commande $commande)
    {   
        $commande->update([
            'livraison_statut' => 'accepter',
            'commande_statut' => 'en_livraison'
        ]);

       $commandeNumber = $commande->commande_number;
       $livreurName = Auth::user()->name;
       $id_admin = $commande->id_admin;

        Notification::create([
         'titre' => "Livraison du Commande $commandeNumber accepté",
         'message' => "La commande $commandeNumber est accepté pour la livraison par le livreur '$livreurName'",
         'id_utilisateur' => $id_admin ,
        ]);

        return redirect()->route('livreur.commandes')
            ->with('success', 'Commande est acceptée.');
    }

    public function refuserLivraison(Commande $commande)
    {
        $commande->update([
            'livraison_statut' => 'refuser'
        ]);

        $commandeNumber = $commande->commande_number;
        $livreurName = Auth::user()->name;
        $id_admin = $commande->id_admin;
 
         Notification::create([
          'titre' => "Livraison du Commande $commandeNumber refusé",
          'message' => "La commande $commandeNumber est refusé pour la livraison par le livreur '$livreurName'",
          'id_utilisateur' => $id_admin ,
         ]);

        return redirect()->route('livreur.commandes')
            ->with('success', 'Commande est refusée.');
    }

}
