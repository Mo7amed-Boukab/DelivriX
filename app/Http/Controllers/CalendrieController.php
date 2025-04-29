<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colis;

class CalendrieController extends Controller
{
    public function viewCalendriePage()
    {
        $colis = Colis::whereNull('date_sortie')->with(['commande.client'])->get();

        $colisLivraison = Colis::whereNotNull('date_sortie')->with(['commande.client'])->get();

        return view("dashboard/livreur/calendrie", compact('colis', 'colisLivraison'));
    }

    public function ajouteRendezVous(Request $request)
    {
     
        $request->validate([
           'colis_id' => 'required|exists:colies,id',
           'date_sortie' => 'required|date|after_or_equal:today',
           'heure_sortie' => 'required|date_format:H:i'
        ]);

        try {     

            $colis = Colis::findOrFail($request->colis_id);
            $colis->date_sortie = $request->date_sortie;
            $colis->heure_sortie = $request->heure_sortie;
            $colis->save();

            return redirect()->back()
                ->with('success', 'Rendez-vous de livraison ajouté avec succès');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'ajout du rendez-vous')
                ->withInput();
        }
    }
}
