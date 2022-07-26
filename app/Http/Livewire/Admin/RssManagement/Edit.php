<?php

namespace App\Http\Livewire\Admin\RssManagement;

use App\Models\Admin\Rss;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Team;
use Livewire\Component;

class Edit extends Component
{
    public Rss $rss;
    public $avatar;
    public $tags;
    public $categories;
    public $teams;

    public function render()
    {
        $this->tags = Tag::orderBy('id', 'desc')->pluck('name', 'id');
        $this->categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
        $this->teams = Team::orderBy('id', 'desc')->pluck('title', 'id');
        return view('livewire.admin.rss-management.edit');
    }
}
