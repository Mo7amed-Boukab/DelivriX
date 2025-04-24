<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivreurController extends Controller
{
   public function index(){
       return view("dashboard/livreur/index");
  }
}
