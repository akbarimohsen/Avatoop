<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Profile;
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
