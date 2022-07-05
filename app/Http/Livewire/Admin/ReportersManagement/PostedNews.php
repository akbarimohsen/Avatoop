<?php

namespace App\Http\Livewire\Admin\ReportersManagement;

use Livewire\Component;

class PostedNews extends Component
{
    public $all_news;
    public $category;

    // Search news Property
    public $searchInput;

    // select properties
    public $selectAll;


    public function mount($news, $category){
        $this->all_news = $news;
        $this->category = $category;
    }



    public function searchNews(){
        $data = $this->validate([
            'searchInput' => 'required|string'
        ]);

        $this->all_news = $this->all_news->where('title', 'like', "%$this->searchInput%")->get();
    }




    public function render()
    {
        return view('livewire.admin.reporters-management.posted-news');
    }
}
