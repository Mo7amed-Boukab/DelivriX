<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaiementsController extends Controller
{
   public function viewPaiementLivreurPage()
   {
       return view('dashboard.livreur.paiements');
   }

   public function viewPaiementAdminPage()
   {
       return view('dashboard.admin.paiements');
   }
   
}
