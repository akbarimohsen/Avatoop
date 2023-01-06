<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Nationality;
use App\Models\Position;
use DateTime;

class PlayerManagementController extends Controller
{

    public function index()
    {
        $team = null;
        return view('admin.playerManagement.index', compact('team'));
    }

    public function add()
    {
        $teams = Team::all();
        $nationalities = Nationality::all();
        $positions = Position::all();
        return view('admin.playerManagement.add',compact('teams', 'nationalities', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|unique:players',
            'birth_date' => 'required',
            'description' => 'required|string',
            'team_id' => 'required',
            'nationality_id' => 'required',
            'position_id' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $player = new Player();

        $temp = $request->birth_date;
        $birth_date = new DateTime(substr($temp,0, 2) . "-" . substr($temp,3, 2) . "-" .substr($temp, 6,4 )) ;

        $player->full_name = $request->full_name;
        $player->birth_date = $birth_date ;
        $player->description = $request->description;
        $player->team_id = intval($request->team_id);
        $player->nationality_id = intval($request->nationality_id);
        $player->position_id = intval($request->position_id);
        $player->img = $this->handleImageUpload($request);

        $player->save();
        $player->positions()->attach($request->position_id);

        return redirect()->route('admin.players');
    }

    public function handleImageUpload(Request $request)
    {
        $dir = 'images/players';
        $name = rand(100, 10000) . "_" . $request->img->getClientOriginalName();
        $request->img->storeAs($dir, $name,'ftp');
        return "$dir/$name";
    }

    public function edit($id)
    {
        $player = Player::find($id);
        $teams = Team::all();
        $nationalities = Nationality::all();
        $positions = Position::all();
        return view('admin.playerManagement.edit',compact('player', 'teams', 'nationalities', 'positions'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'full_name' => 'required|string',
            'birth_date' => 'required',
            'description' => 'required|string',
            'team_id' => 'required',
            'nationality_id' => 'required',
            'position_id' => 'required',
            'img' => 'image|mimes:png,jpg,jpeg'
        ]);

        $player = Player::find($id);

        $temp = $request->birth_date;
        $birth_date = new DateTime(substr($temp,8, 2) . "/" . substr($temp,5, 2) . "/" .substr($temp, 0,4 )) ;

        $player->full_name = $request->full_name;
        $player->birth_date = $birth_date ;
        $player->description = $request->description;
        $player->team_id = intval($request->team_id);
        $player->nationality_id = intval($request->nationality_id);
        $player->position_id = intval($request->position_id);
        if($request->has('img')){
            $player->img = $this->handleImageUpload($request);
        }
        $player->save();
        $player->positions()->attach($request->position_id);

        return redirect()->route('admin.players');
    }



}
