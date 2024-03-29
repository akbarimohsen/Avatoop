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

    public function index()
    {
        $ads = Ad::all();
        return view('home', compact('ads'));
    }


    public function showLeagueData($id)
    {

        if ($id >= 1 && $id <= 17) {
            $content = Storage::disk('local')->get('leagues.json');
            $array = json_decode($content, true);
            return json_decode($array[$id]);

        } else {
            return response()->json([
                "data" => null
            ]);
        }

    }


    public function example()
    {

        $array = [];

        for ($i = 1; $i <= 17; $i++) {
            $response = Http::get("https://api.avatoop.com/$i");
            $array[$i] = $response->body();
        }

        $jsonString = json_encode($array);

        if (Storage::disk('local')->exists('leagues.json')) {
            Storage::disk('local')->delete('leagues.json');
        }

        Storage::disk('local')->put('leagues.json', $jsonString);

    }


}
