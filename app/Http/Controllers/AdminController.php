<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
       return view("dashboard/admin/index");
    }

    public function viewClientPage()
   {
    $clients = Client::with('utilisateur')->get();
    return view("dashboard/admin/clients", compact('clients'));
   }
}
