<?php

namespace App\Http\Controllers;

use App\Models\Admin\Rss;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RssController extends Controller
{

    public function index()
    {
        $search=\request('search-rss');
        if ($search!==null){
            $Rsses=Rss::orderBy('active','DESC')->where(function ($query) use ($search) {
                $query->where('title','LIKE',"%{$search}=%")->orWhere(function ($query) use ($search) {
                    $query->where('description','LIKE',"%{$search}%");
                });
            })->with('categories','tags','rss_comments','teams','likers')->paginate(27);

        }else{
            $Rsses=Rss::orderBy('active','DESC')->with('categories','tags','rss_comments','teams','likers')->paginate(27);

        }
        return view('admin.rsses.index',compact('Rsses'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {

    }


    public function show(Rss $rss)
    {

    }


    public function edit(Rss $rss)
    {
        return view('admin.rsses.edit',compact('rss'));
    }

    public function update(Request $request,Rss $rss)
    {

    }

    public function destroy(Rss $rss)
    {

    }
}
