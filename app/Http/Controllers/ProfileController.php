<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Client;
use App\Models\User;

class ProfileController extends Controller
{
   public function viewProfileLivreurPage()
   {
    return view("dashboard/livreur/profile");
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


   public function updateClientPassword(Request $request)
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

}
