<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColieController extends Controller
{
   public function viewColisPage()
   {
       return view('dashboard.livreur.colis');
   }
}
