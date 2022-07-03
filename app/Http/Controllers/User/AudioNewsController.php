<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AudioNews;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AudioNewsController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $userTeams = $user->popularTeams;
        $audioNews = $user->AudioNews;
        $news_ids = [];

        foreach($audioNews as $news){
            $news_ids[] = $news->news_id;
        }

        $all_news = News::whereIn('id', $news_ids)->get();

        return view('user.AudioNews.index',[
            'all_news' => $all_news,
            'userTeams' => $userTeams
        ]);
    }
}
