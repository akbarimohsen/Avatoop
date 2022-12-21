<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Arrange;
use App\Models\League;
use App\Models\Profile;
use App\Models\Schematic;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArrangeController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user();
        $data = Profile::where('user_id', $userAuth->id)->get()->first();

        $team = Team::where('id', $data->team_id)->first();
        $isIranLeague = League::where('id', $team->league_id)->where('title', 'Like', "%iran%")->orWhere('title', 'Like', "%برتر ایران%")->orWhere('title', 'Like',"%Persian Gulf%")->exists();
        if ($isIranLeague){
            $user = Auth::user()->arranges()->get(['id', 'schematic_id', 'players']);
            return response()->json([
                'arrange' => $user
            ]);
        }else{
            $user = Auth::user()->arranges()->get(['id', 'schematic_id', 'players']);
            return response()->json([
                'arrange' => $user,
                'message' => "تیم محبوب شما از لیگ ایران نمیباشد پس نمیتونی اررنج داشته باشی"
            ]);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "schematic_id"=>"required|integer",
            'players'=>"required|string"
        ]);
        $user = Auth::user();

        $arrange = Arrange::where('user_id', $user->id)->update([
             'schematic_id' => $request->schematic_id,
             'players' => $request->players,
        ]);
        return response()->json([
            'MSG' => 'ترکیب شما با موفقیت ایجاد شد!'
        ]);
    }

    public function showAll()
    {
        $schematic = Schematic::all();
        return response()->json([
           'schematic' => $schematic
        ]);
    }
}
