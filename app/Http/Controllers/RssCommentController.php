<?php

namespace App\Http\Controllers;

use App\Models\Admin\RssComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RssCommentController extends Controller
{
    public function index($category = null)
    {
        if($category == null ){
            $comments = RssComment::where('status', 0)->orderBy('created_at', 'desc')->get();
        }else if($category == "accepted"){
            $comments = RssComment::where('status', 1)->orderBy('created_at', 'desc')->get();
        }else if($category == "rejected"){
            $comments = RssComment::where('status', -1)->orderBy('created_at', 'desc')->get();
        }else if($category == "deleted"){
            $comments = RssComment::where('status', -2)->orderBy('created_at', 'desc')->get();
        }

        return view('admin.rssCommentsManagement.index', compact('comments', 'category'));
    }

    public function show($id){
        $comment = RssComment::findOrFail($id);

        return view('admin.rssCommentsManagement.show', ['comment' => $comment]);
    }
}
