<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class UserNotificationController extends Controller
{
    public function index(User $user)
    {
        return $user->unreadNotifications;
    }


    public function destroy(User $user, DatabaseNotification $notification)
    {
        $notification->markAsRead();
    }
}
