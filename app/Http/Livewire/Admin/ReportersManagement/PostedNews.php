<?php

namespace App\Http\Livewire\Admin\ReportersManagement;

use App\Models\News;
use Livewire\Component;

class PostedNews extends Component
{
    public $all_news;
    public $category;

    // Search news Property
    public $searchInput;

    // select properties
    public $SelectAll;
    public $selectedNews = [];


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

    public function updatedSelectAll()
    {
        if( $this->SelectAll == true ){
            foreach($this->all_news as $news){
                $this->selectedNews[$news->id] = $news->id;
            }
        }else{
                $this->selectedNews = [];
        }
    }

    public function changeStatus($status)
    {
        $selectedNews = News::whereIn('id', $this->selectedNews)->get();
        $temp = 0;
        if($status == 'accepted'){
            $temp = 1;
        }else if($status == 'deleted'){
            $temp = -2;
        }else if($status == 'rejected'){
            $temp = -1;
        }
        foreach($selectedNews as $new){
            $new->status = $temp;
            $new->save();
        }

        if($status == "deleted" ){
            session()->flash('delete_message', 'خبرهای انتخابی به سطل آشغال انتقال یافتند.');
        }else if($status == "accepted"){
            session()->flash('accept_message', 'خبر های انتخابی با موفقیت تایید شدند.');
        }else if($status == "rejected"){
            session()->flash('reject_message', 'خبر های انتخابی رد گردیدند.');
        }

        return redirect()->route('admin.reporters.showPostedNews');

    }
    public function render()
    {
        return view('livewire.admin.reporters-management.posted-news');
    }
}
