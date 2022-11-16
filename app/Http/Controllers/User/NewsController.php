<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //


    public function favoriteTeamsNews()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $report = Team::with('news')->where('id',$profile->team_id)->get();
        return $report;

       // return view('user.favoriteTeamsNews', compact('user'));
    }

    public function favoriteTeamsRsses()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $report = Team::with('rsses')->where('id',$profile->team_id)->get();
        return response()->json([
            'rss'=>$report,
        ]);

       // return view('user.favoriteTeamsNews', compact('user'));
    }
}
