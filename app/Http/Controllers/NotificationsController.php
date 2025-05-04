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
      $notifications = Notification::where('id_utilisateur', $userId)->where('statut','non_lue')->orderBy('created_at', 'desc')->get();
      
      return view("dashboard/admin/notifications", compact('notifications'));
   }

   public function viewNotificationsLivreurPage()
   {
      $userId = Auth::id();
      $notifications = Notification::where('id_utilisateur', $userId)->where('statut','non_lue')->orderBy('created_at', 'desc')->get();
      
      return view("dashboard/livreur/notifications", compact('notifications'));
   }

   public function viewNotificationsClientPage()
   {
      $userId = Auth::id();
      $notifications = Notification::where('id_utilisateur', $userId)->where('statut','non_lue')->orderBy('created_at', 'desc')->paginate(10);
      
      return view("dashboard/client/notifications", compact('notifications'));
   }

   public function lireNotification($id)
   {
      $userId = Auth::id();
      $notification = Notification::where('id', $id)->where('id_utilisateur', $userId)->first();
                      
      if ($notification) {
         $notification->update(['statut' => 'lue']);
         return redirect()->back()->with('success', 'Notification marquée comme lue.');
      }
      
      return redirect()->back()->with('error', 'Notification non trouvée.');
   }
   
   public function lireToutesNotifications()
   {
      $userId = Auth::id();
      Notification::where('id_utilisateur', $userId)->where('statut', 'non_lue')->update(['statut' => 'lue']);
                 
      return redirect()->back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
   }

}
