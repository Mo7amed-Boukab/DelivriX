<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
   public function viewNotificationsAdminPage()
   {
      $userId = Auth::id();
      $notifications = Notification::where('id_utilisateur', $userId)->orderBy('created_at', 'desc')->get();
      
      return view("dashboard/admin/notifications", compact('notifications'));
   }

   public function viewNotificationsLivreurPage()
   {
      $userId = Auth::id();
      $notifications = Notification::where('id_utilisateur', $userId)->orderBy('created_at', 'desc')->get();
      
      return view("dashboard/livreur/notifications", compact('notifications'));
   }
}
