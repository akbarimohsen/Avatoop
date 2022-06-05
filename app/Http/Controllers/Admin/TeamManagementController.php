<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    //

    public function index(){
        return view('admin.teamManagement.index');
    }

    public function add(){
        return view('admin.teamManagement.add');
    }

    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.teamManagement.edit',compact('team'));
    }

    public function showPlayers($id)
    {
        $team = Team::find($id);

        return view('admin.playerManagement.index', compact('team'));
    }
}
