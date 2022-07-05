<?php

namespace App\Http\Livewire\Reporter\NewsManagement;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class NewsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    protected $queryString = ['searchTerm'];


    public function search()
    {
        $data=$this->validate([
            'searchTerm' =>'string'
        ]);
        $this->searchTerm=$data['searchTerm'];

    }
    public function render()
    {
        if ($this->searchTerm==null){
            $news=News::where('reporter_id','=',Auth::id())->latest()->paginate(27);
        }else{
            $news=News::where('reporter_id','=',Auth::id())->where(function ($query){
                $query->where('title','LIKE',"%{$this->searchTerm}%")->orWhere(function ($query){
                    $query->where('header','LIKE',"%{$this->searchTerm}%")->orWhere(function ($query){
                        $query->where('description','LIKE',"%{$this->searchTerm}%");
                    });
                });
            })->latest()->paginate(27);
        }
        return view('livewire.reporter.news-management.news-table',compact('news'));
    }
}
