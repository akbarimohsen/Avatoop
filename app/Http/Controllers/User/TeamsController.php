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
        // $user = Auth::user();
        // $popular_teams = $user->popularTeams;
        // $collection = collect($popular_teams);
        // $filtered = $collection->except(['id', '0.pivot']);
        // //  return response()->json([
        //      'user' => $filtered,
        //  ]);
        // return response()->json([
        //     'user.teams.popularTeams' => $popular_teams,
        // ]);
    }

    public function addPopularTeam()
    {
        // $team_id = intval($id);
        // $user = Auth::user();
        // //$popular_teams = $user->popularTeams;
        // $user->popularTeams()->attach($team_id);

        return view('user.teams.addPopularTeam');
    }

    public function deletePopularTeam($id)
    {
        $team_id = intval($id);
        $user_id = Auth::user()->id;

        DB::table('popular_teams')->where('team_id', $team_id)->where('user_id', $user_id)->delete();
        // return response()->json([
        //     'message' => 'تیم محبوب شما با موفقیت حذف گردید.'
        // ]);

        session()->flash('message', 'تیم محبوب شما با موفقیت حذف گردید.');
        return redirect()->route('user.popularTeams');
    }

}
