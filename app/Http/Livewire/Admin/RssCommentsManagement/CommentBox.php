<?php

namespace App\Http\Livewire\Admin\RssCommentsManagement;

use Livewire\Component;
use App\Models\Admin\RssComment;

class CommentBox extends Component
{
    public $comment;

    public function mount($comment){
        $this->comment = $comment;
    }


    public function changeStatus($status){
        $comment = RssComment::find($this->comment->id);

        $comment->status = $status;
        $comment->timestamps = false;

        $comment->save();
        return redirect()->route('admin.rsscomments');
    }

    public function render()
    {
        return view('livewire.admin.rss-comments-management.comment-box');
    }
}
