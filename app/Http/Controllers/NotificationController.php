<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        
        // Dapatkan notifikasi yang belum dibaca
        $notifications = Notification::where('user_id', $user_id)
                                    ->where('read_status', 0)
                                    ->get();

        // Tandai notifikasi sebagai telah dibaca
        Notification::where('user_id', $user_id)
                    ->where('read_status', 0)
                    ->update(['read_status' => 1]);

        return view('notifications.index', ['notifications' => $notifications]);
    }
}
