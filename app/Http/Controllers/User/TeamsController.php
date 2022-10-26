<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Arrange;
use App\Models\Player;
use App\Models\Profile;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class TeamsController extends Controller
{
    public function showPopularTeams()
    {

        $user_id = Auth::user()->id;
        $popular_team = Profile::with('team')->where('user_id', $user_id)->get(['slug', 'first_name', 'last_name', 'image', 'team_id']);
        return $popular_team;
        $team_id = $popular_team[0]->team->id;
        $players = Player::with('positions')->where('team_id', $team_id)->get();
//        $players->put('position_id','kia');
//        $test=$players->replace(['position_id'=>'kia']);
        return response()->json([
            'team_user' => $popular_team,
            'players' => $players
        ]);

        // $user = Auth::user();
        // $popular_teams = $user->popularTeams;
        // $collection = collect($popular_teams);
        // $filtered = $collection->except(['id', '0.pivot']);
        // //  return response()->json([
        //      'user' => $filtered,
        //  ]);

    }

    public function addPopularTeam($id)
    {
        $user = Auth::user();
        $test = DB::table('popular_teams')->where('user_id', $user->id)->where('team_id', $id)->exists();

        if ($test !== true) {
            $team_id = intval($id);
            $profile = Profile::where('user_id', $user->id)->update([
                'team_id' => $team_id,
            ]);
            Arrange::create([
                'user_id' => Auth::user()->id,
                'schematic_id' => null,
                'players' => '[{"post":"L0","image":"#","id":""},{"post":"L1","image":"#","id":""},{"post":"L2","image":"#","id":""},{"post":"L3","image":"#","id":""},{"post":"L4","image":"#","id":""},{"post":"L5","image":"#","id":""},{"post":"L6","image":"#","id":""},{"post":"L7","image":"#","id":""},{"post":"L8","image":"#","id":""},{"post":"L9","image":"#","id":""},{"post":"L10","image":"#","id":""}]'
            ]);
            return response()->json([
                'MSG' => 'تیم با موفقیت افزوده شد',
            ]);
        } else
            return response()->json(['قبلا ثبت شده است'], 400);
    }

    public function deletePopularTeam($id)
    {
        $team_id = intval($id);
        $user_id = Auth::user()->id;
        $profile = Profile::where('user', $user_id);
        $profile->update([
            'team_id' => NULL
        ]);
        if ($profile->team_id == Null) {
            return response()->json([
                'MSG' => 'تیم محبوب شما قبلا حذف شده است'
            ]);
        }
        return response()->json([
            'MSG' => 'تیم محبوب شما با موفقیت حذف گردید.'
        ]);


    }

//    public function showPlayersTeam()
//    {
//        $players = auth()->user()->popularTeams[0]->players;
//        $team = auth()->user()->popularTeams[0]->title;
//
//        return response()->json([
//          'players' =>  $players,
//          'team' => $team
//        ]);
//
//    }

}
