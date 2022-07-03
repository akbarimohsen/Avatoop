<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //


    public function favoriteTeamsNews()
    {
        $user = Auth::user();

        return view('user.favoriteTeamsNews', compact('user'));
    }
}
