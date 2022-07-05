<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class ReportersMangementController extends Controller
{
    //

    public function reportersList()
    {
        $reporters = User::role('reporter')->get();

        return view('admin.reportersManagement.reportersList', compact('reporters'));
    }

    public function showPostedNews($category = null){

        if($category == null ){
            $news = News::where('status', null)->get();
        }else if($category == "accepted"){
            $news = News::where('status', 'accept')->get();
        }else if($category == "rejected"){
            $news = News::where('status', 'reject')->get();
        }else if($category == "deleted"){
            $news = News::where('status', 'delete')->get();
        }

        return view('admin.reportersManagement.PostedNews',compact('news', 'category'));
    }
}
