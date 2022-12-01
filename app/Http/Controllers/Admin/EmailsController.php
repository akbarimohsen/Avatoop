<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\User;
use App\Notifications\sendEmailToUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class EmailsController extends Controller
{

    public function showEmails()
    {
        $emails = Email::where('type', 1)->get();

        return view('admin.emailsManagement.showEmails', compact('emails'));
    }

    public function showUsers()
    {
        return view('admin.emailsManagement.showUsers');
    }

    public function writeEmail(Request $request)
    {
        $data = $request->validate([
            'selectedUsers' => 'required'
        ]);

        $users = User::whereIn('id', $data['selectedUsers'])->get();

        return view('admin.emailsManagement.writeEmail', compact('users'));
    }

    public function sendEmail(Request $request){
        $data = $request->validate([
            'selectedUsers' => 'required',
            'title' => 'required|string',
            'text' => 'required|string'
        ]);

        $users = User::whereIn('id', $data['selectedUsers'])->get();

        $data = [
            'title' => $data['title'],
            'text' => $data['text'],
            'type' => 1
        ];

        $email = Email::create($data);

        Notification::send($users, new sendEmailToUsers($email));

        session()->flash('message', 'ایمیل با موفقیت به کاربران مورد نظر ارسال شد.');

        return redirect()->route('admin.emails.showEmails');
    }


    public function showEmail($id)
    {
        $email = Email::findOrFail($id);

        $notifications = DB::table('notifications')->where('notifiable_type','App\Models\User')->where('data' , 'like' ,"{\"email_id\":$email->id}")->get();

        $user_ids = [];

        foreach($notifications as $notification){
            $user_ids[] = $notification->notifiable_id;
        }
        $users = User::whereIn('id', $user_ids)->get();

        return view('admin.emailsManagement.emailDetails', compact('users','email'));

    }

    public function deleteEmail($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();

        $emails = User::role('user')->get();

        session()->flash('delete_email_message', 'ایمیل موردنظر با موفقیت حذف گردید.');
        return redirect()->route('admin.emails.showEmails');
    }
}
