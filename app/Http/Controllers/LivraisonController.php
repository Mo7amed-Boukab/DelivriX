<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use App\Models\Livreur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmailLivreur;

class LivraisonController extends Controller
{
   public function viewLivraisonPage()
   {
      $livreurs = Livreur::with('utilisateur')->get();
      return view("dashboard/admin/livraison", compact('livreurs'));
   }

   public function ajouteLivreur(Request $request)
   {
       $request->validate([
           'nom_livreur' => 'required|string|max:255',
           'nom_entreprise' => 'required|string|max:255',
           'email' => 'required|email|unique:utilisateurs,email',
           'phone' => 'required|string|max:20',
           'ville' => 'required|string|max:255',
           'adresse' => 'required|string|max:255',
       ]);

       $password = Str::random(8) . rand(10, 99) . '!@';

       try {
           $utilisateur = Utilisateur::create([
               'name' => $request->nom_livreur,
               'email' => $request->email,
               'password' => Hash::make($password), 
               'role' => 'livreur',
               'phone' => $request->phone,
               'ville' => $request->ville,
               'adresse' => $request->adresse,
           ]);

           Livreur::create([
               'id' => $utilisateur->id,
               'nom_livreur' => $request->nom_livreur,
               'nom_entreprise' => $request->nom_entreprise,
           ]);

           Mail::to($request->email)->send(new sendEmailLivreur(
            $request->nom_livreur,
            $request->email,
            $password,
        ));

           return redirect()->route('admin.commandes')
               ->with('success', 'Livreur ajouté avec succès.');
       } catch (\Exception $e) {
           return redirect()->route('admin.commandes')
               ->with('error', 'Une erreur est survenue lors de l\'ajout du livreur.');
       }
   }

   public function deleteLivreur($id)
   {
       try {       
           $livreur = Livreur::findOrFail($id);

           if ($livreur->commandes()->count() > 0) {
               $livreur->update(['statut' => 'indisponible']);
               return redirect()->route('admin.livraison')
                   ->with('success', 'Le livreur a été désactivé. Impossible de le supprimer car il a des commandes associées.');
           }
           
           $utilisateur = Utilisateur::findOrFail($id);
           
           $livreur->delete();
           $utilisateur->delete();
           
           return redirect()->route('admin.livraison')
               ->with('success', 'Livreur supprimé avec succès.');
       } catch (\Exception $e) {
           return redirect()->route('admin.livraison')
               ->with('error', 'Une erreur est survenue lors de la suppression du livreur: ' . $e->getMessage());
       }
   }
}
