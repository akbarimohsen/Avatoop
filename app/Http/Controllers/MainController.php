<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\League;

class MainController extends Controller
{

    public function index(){
        $ads = Ad::all();
        return view('home',compact('ads'));
    }


    public function showLeagueData($id){
        $league = League::find($id);

        if($league->api_id == null ){
            return view('errors.404');
        }

        if($league->api_id >= 1 && $league->api_id <= 17){
            $response = Http::get("https://api.avatoop.com/$league->api_id");
            $body = $response->body();
            return $body;
        }else{
            return view('errors.404');
        }

    }

}
