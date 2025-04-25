<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
