<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivraisonController extends Controller
{
   public function viewLivraisonPage()
   {
      return view("dashboard/admin/livraison");
   }
}
