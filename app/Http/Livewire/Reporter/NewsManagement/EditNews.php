<?php

namespace App\Http\Livewire\Reporter\NewsManagement;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditNews extends Component
{
    use WithFileUploads;

    public News $news;
    public $avatar;
    public $tags;
    public $categories;
    public $teams;
    public function render()
    {
        $this->tags=Tag::orderBy('id','desc')->pluck('name','id');
        $this->categories=Category::orderBy('id','desc')->pluck('name','id');
        $this->teams=Team::orderBy('id','desc')->pluck('title','id');
        return view('livewire.reporter.news-management.edit-news',['tags'=>$this->tags,'categories'=>$this->categories,'teams'=>$this->teams]);
    }
}
