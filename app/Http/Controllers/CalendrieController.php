<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendrieController extends Controller
{
   public function viewCalendriePage()
   {
      return view("dashboard/livreur/calendrie");
   }
}
