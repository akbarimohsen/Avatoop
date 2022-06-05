<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerManagementController extends Controller
{
    //

    public function index()
    {
        $team = null;
        return view('admin.playerManagement.index', compact('team'));
    }

    public function add()
    {
        return view('admin.playerManagement.add');
    }

    public function edit($id)
    {
        $player = Player::find($id);
        return view('admin.playerManagement.edit',compact('player'));
    }



}
