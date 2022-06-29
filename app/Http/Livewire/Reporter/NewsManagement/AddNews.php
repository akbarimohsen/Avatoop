<?php

namespace App\Http\Livewire\Reporter\NewsManagement;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNews extends Component
{
    use WithFileUploads;
    public $photo;
    public $tags;
    public $categories;
    public $teams;
    public function updatedPhoto()

    {

        $this->validate([

            'photo' => 'image|max:1024',

        ]);

    }
    public function render()
    {
        $this->tags=Tag::orderBy('id','desc')->get();
        $this->categories=Category::orderBy('id','desc')->get();
        $this->teams=Team::orderBy('id','desc')->get();
        return view('livewire.reporter.news-management.add-news',['tags'=>$this->tags,'categories'=>$this->categories,'teams'=>$this->teams]);
    }
}
