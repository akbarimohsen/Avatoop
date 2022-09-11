<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
{
    //


    public function showPopularTeams(){
        $user = Auth::user();
        $popular_teams = $user->popularTeams;
        return view('user.teams.popularTeams', compact('popular_teams'));
    }



    public function deletePopularTeam($id)
    {
        $team_id = intval($id);
        $user_id = Auth::user()->id;

        DB::table('popular_teams')->where('team_id', $team_id)->where('user_id', $user_id)->delete();

        session()->flash('message', 'تیم محبوب شما با موفقیت حذف گردید.');

        return redirect()->route('user.popularTeams');
    }

}
