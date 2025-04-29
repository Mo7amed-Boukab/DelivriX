<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function viewProfileLivreurPage()
   {
    return view("dashboard/livreur/profile");
   }
   public function viewProfileClientPage()
   {
    return view("dashboard/client/profile");
   }
}
