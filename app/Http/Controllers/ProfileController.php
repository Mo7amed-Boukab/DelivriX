<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Client;
use App\Models\Livreur;
use App\Models\Commande;

class ProfileController extends Controller
{
   public function viewProfileLivreurPage()
   {
    $user = Auth::user();
    $livreur = $user->livreur;
    
    return view("dashboard/livreur/profile", compact('user', 'livreur'));
   }
   
   public function viewProfileAdminPage()
   {
    $user = Auth::user();
    $admin = $user->administrateur;
    
    $clients_count = Client::count();
    $livreurs_count = Livreur::count();
    $commandes_count = Commande::count();
    
    return view("dashboard/admin/profile", compact('user', 'admin', 'clients_count', 'livreurs_count', 'commandes_count'));
   }
   
   public function viewProfileClientPage()
   {
    $user = Auth::user();
    return view("dashboard/client/profile", compact('user'));
   }

   public function updateClientProfile(Request $request)
   {
       $user = Auth::user();

       $data = $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'email', Rule::unique('utilisateurs')->ignore($user->id)],
           'phone' => ['required', 'string', 'max:20'],
           'ville' => ['required', 'string', 'max:20'],
           'adresse' => ['required', 'string', 'max:255'],
       ]);

       try {
           $user->update($data); 

           return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de vos informations.');
       }
   }


   public function updatePassword(Request $request)
   {
       $user = Auth::user();

       $data = $request->validate([
           'current_password' => ['required'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);

       if (!Hash::check($data['current_password'], $user->password)) {
           return redirect()->back()->with('error', 'Le mot de passe actuel est incorrect.');
       }

       try {
           $user->update(['password' => Hash::make($data['password'])]);

           return redirect()->back()->with('success', 'Votre mot de passe a été mis à jour avec succès.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de votre mot de passe.');
       }
   }

   public function updatePhoto(Request $request)
   {
       $user = Auth::user();

       $request->validate([
           'photo' => ['required', 'image', 'max:2048'],
       ]);

       try {
           if ($user->photo) {
               Storage::delete($user->photo);
           }

           $path = $request->file('photo')->store('profile-photos', 'public');      
           $user->update(['photo' => $path]);

           return redirect()->back()->with('success', 'Votre photo de profil a été mise à jour avec succès.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de votre photo de profil.');
       }
   }
   public function updateLivreurProfile(Request $request)
   {
       $user = Auth::user();
       $livreur = $user->livreur;

       $data = $request->validate([
           'nom_entreprise' => ['required', 'string', 'max:255'],
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'email', Rule::unique('utilisateurs')->ignore($user->id)],
           'phone' => ['required', 'string', 'max:20'],
           'statut' => ['required', 'in:disponible,indisponible'],
           'ville' => ['required', 'string', 'max:50'],
           'adresse' => ['required', 'string', 'max:255'],
       ]);

       try {
           $user->update([
               'name' => $data['name'],
               'email' => $data['email'],
               'phone' => $data['phone'],
               'ville' => $data['ville'],
               'adresse' => $data['adresse'],
           ]);

           $livreur->update([
               'nom_entreprise' => $data['nom_entreprise'],
               'statut' => $data['statut'],           
           ]);

           return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de vos informations.');
       }
   }
   public function updateAdminProfile(Request $request)
   {
       $user = Auth::user();
       $admin = $user->administrateur;
   
       $data = $request->validate([
           'nom_entreprise' => ['required', 'string', 'max:255'],
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'email', Rule::unique('utilisateurs')->ignore($user->id)],
           'phone' => ['required', 'string', 'max:20'],
           'description' => ['nullable', 'string', 'max:255'],
           'ville' => ['required', 'string', 'max:50'],
           'adresse' => ['required', 'string', 'max:255'],
       ]);
   
       try {
           $user->update([
               'name' => $data['name'],
               'email' => $data['email'],
               'phone' => $data['phone'],
               'ville' => $data['ville'],
               'adresse' => $data['adresse'],
           ]);
   
           $admin->update([
               'nom_entreprise' => $data['nom_entreprise'],
               'description' => $data['description'],
           ]);
   
           return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de vos informations : ' . $e->getMessage());
       }
   }
   
}
