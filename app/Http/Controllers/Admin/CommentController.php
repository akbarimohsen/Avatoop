<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function index($category = null)
    {
        if($category == null ){
            $comments = Comment::where('status', 0)->orderBy('created_at', 'desc')->get();
        }else if($category == "accepted"){
            $comments = Comment::where('status', 1)->orderBy('created_at', 'desc')->get();
        }else if($category == "rejected"){
            $comments = Comment::where('status', -1)->orderBy('created_at', 'desc')->get();
        }else if($category == "deleted"){
            $comments = Comment::where('status', -2)->orderBy('created_at', 'desc')->get();
        }

        return view('admin.commentsMangement.index', compact('comments', 'category'));
    }

    public function show($id){
        $comment = Comment::findOrFail($id);

        return view('admin.commentsMangement.show', ['comment' => $comment]);
    }
}
