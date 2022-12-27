<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Arrange;
use App\Models\League;
use App\Models\Player;
use App\Models\Profile;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class TeamsController extends Controller
{
    public function showPopularTeams()
    {

        $user_id = Auth::user()->id;
        $popular_team = Profile::with('team')->where('user_id', $user_id)->get(['slug', 'first_name', 'last_name', 'image', 'team_id']);
        $team = Team::where('id', $popular_team[0]->team_id)->first();
        $isIranLeague = League::where('id', $team->league_id)->where(function ($query) {
            $query->where('title', 'Like', "%برتر ایران%")->orWhere(function ($query) {
                $query->where('title', 'Like', "%Persian Gulf%");
            });

        })->exists();

        $team_id = $popular_team[0]->team->id;
        $players = Player::with('positions')->where('team_id', $team_id)->get();
        $arrange = Arrange::where('user_id', $user_id)->get('players');

//        $players->put('position_id','kia');
//        $test=$players->replace(['position_id'=>'kia']);
        if ($isIranLeague) {
            return response()->json([
                'team_user' => $popular_team,
                'players' => $players,
                'arrange' => $arrange
            ]);
        } else {
            return response()->json([
                'team_user' => $popular_team,
                'players' => "بازیکنان این تیم را نمیتوانید دریافت کنید",
                'arrange' => "به دلیل نبودن تیم محبوب شما در لیگ ایران،نمیتوانید اررنج داشته باشید"
            ]);
        }


        // $user = Auth::user();
        // $popular_teams = $user->popularTeams;
        // $collection = collect($popular_teams);
        // $filtered = $collection->except(['id', '0.pivot']);
        // //  return response()->json([
        //      'user' => $filtered,
        //  ]);

    }

    public function addPopularTeam()
    {

        $user = Auth::user();
        $exists = Arrange::where('user_id', $user->id)->exists();
        if (!$exists) {
                Arrange::create([
                    'user_id' => Auth::user()->id,
                    'schematic_id' => null,
                    'players' => '[{"post":"L0","image":"#","id":""},{"post":"L1","image":"#","id":""},{"post":"L2","image":"#","id":""},{"post":"L3","image":"#","id":""},{"post":"L4","image":"#","id":""},{"post":"L5","image":"#","id":""},{"post":"L6","image":"#","id":""},{"post":"L7","image":"#","id":""},{"post":"L8","image":"#","id":""},{"post":"L9","image":"#","id":""},{"post":"L10","image":"#","id":""}]'
                ]);
        }
        return response()->json([
            'MSG' => 'تیم با موفقیت افزوده شد',
        ],Response::HTTP_OK);
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
