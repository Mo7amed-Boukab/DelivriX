<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
   public function viewNotificationsAdminPage()
   {
      return view("dashboard/admin/notifications");
   }

   public function viewNotificationsLivreurPage()
   {
      return view("dashboard/livreur/notifications");
   }
}
