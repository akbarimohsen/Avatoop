<?php

namespace App\Http\Livewire\Admin\CommentsManagement;

use App\Models\Comment;
use Livewire\Component;

class CommentBox extends Component
{
    public $comment;

    public function mount($comment){
        $this->comment = $comment;
    }


    public function changeStatus($status){
        $comment = Comment::find($this->comment->id);

        $comment->status = $status;
        $comment->timestamps = false;
        // $comment->save([
        //     'status' => $status,
        //     'timestamps' => false
        // ]);

        $comment->save();
        return redirect()->route('admin.comments');
    }

    public function render()
    {
        return view('livewire.admin.comments-management.comment-box');
    }
}
