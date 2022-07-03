<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    //

    public function showProfile()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    public function adminEmails()
    {
        $user = Auth::user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        $notifications= DB::table('notifications')->where('notifiable_id', $user->id)->where('type', 'App\Notifications\sendEmailToUsers')->get();

        $email_ids = [];

        foreach($notifications as $notification){
            $temp = json_decode($notification->data, true);
            $email_ids[] = $temp['email_id'];
        }

        $emails = Email::whereIn('id', $email_ids)->get();

        return view('user.adminEmails', compact('emails', 'user'));
    }
}
