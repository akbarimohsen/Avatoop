<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //

    public function index(){
        $ads = Ad::all();
        return view('home',compact('ads'));
    }
}
