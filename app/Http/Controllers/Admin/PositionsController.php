<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    //

    public function index()
    {
        $positions = Position::all();
        return view('admin.positionManagement.index');
    }
}
