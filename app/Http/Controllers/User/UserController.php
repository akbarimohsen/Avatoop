<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\League;
use App\Models\Profile;
use App\Models\Team;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = Profile::where('user_id', '=', Auth::user()->id)->first();
        if ($user !== null) {
            return response()->json(
                ['MSG' => "شما قبلا ثبت شده اید"],
                400
            );
        }
        $user = Auth::user();
        $data = new Profile();
        $data->user_id = $user->id;
        $data->slug = Str::random(20);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->image = $request->image;
        $data->save();
        return response()->json([
            'status' => 200
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = Profile::where('user_id', $user->id)->get()->first();


        $data->user_id = $user->id;
        $data->slug = $data->slug;
        if ($request->first_name) {
            $data->first_name = $request->first_name;
        }
        if ($request->last_name) {
            $data->last_name = $request->last_name;
        }
      
        if ($request->team_id) {
            // $league = League::where('title', 'Like', "%iran%");
            try{
            $team = Team::where('id', $request->team_id)->first();
            
            $league = League::where('id', $team->league_id)->where('title', 'Like', "%iran%")->get();
            $data->team_id = $request->team_id;
            }
            catch(Exception $e)
            {
                return response()->json([
                    'MSG' => 'تیم مورد نظر متعلق به ایران نمیباشد'
                ], 400);
            }
        }
        if ($request->image) {
            if ($request->file('image')) {
                $this->validate($request, [
                    'image' => 'required|image|max:1024',
                ]);
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/Image'), $filename);
                $data['image'] = $filename;
            }
        }
        $data->save();
        return response()->json([
            'status' => 200
        ]);
    }

    public function showProfile()
    {
        $user = Auth::user();
        $collection = collect($user);
        $filtered = $collection->except(['id', 'roles.0.id', 'roles.0.pivot']);
        // return response()->json([
        //     'user' => $filtered,
        // ]);
        return view('user.profile', compact('user'));
    }
    public function adminEmails()
    {
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        $notifications = DB::table('notifications')->where('notifiable_id', $user->id)->where('type', 'App\Notifications\sendEmailToUsers')->get();
        $email_ids = [];
        foreach ($notifications as $notification) {
            $temp = json_decode($notification->data, true);
            $email_ids[] = $temp['email_id'];
        }
        $emails = Email::whereIn('id', $email_ids)->get();
        return response()->json([
            'email' => $emails,
        ]);
        return view('user.adminEmails', compact('emails', 'user'));
    }
}
