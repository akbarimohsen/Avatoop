<?php

namespace App\Http\Livewire\Admin\RssCommentsManagement;

use Livewire\Component;

class ShowComments extends Component
{

    public $comments;
    public $category;


    public function mount($comments, $category)
    {
        $this->comments = $comments;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.admin.rss-comments-management.show-comments');
    }
}
