<?php

namespace App\Http\Livewire\Reporter\NewsManagement;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNews extends Component
{
    use WithFileUploads;

    public $avatar;
    public $tags;
    public $categories;
    public $teams;


    protected $rules = [
        'title'=>'required|unique:news',
        'header'=>'required',
        'description'=>'required',
        'NewsDate'=>'required',
        'team' => 'required',
        'tag'=>'required',
        'category'=>'required',
        'newsImage'=>'required|image|max:1000',//1MB
        'editor1'=>'required'
    ];
    protected $messages = [

        'title.required' => 'فیلد عنوان اجباری است',
        'header.required' => 'فیلد سرتیتر خبر اجباری است',
        'NewsDate.required' => 'فیلد تاریخ خبر باید وارد شود',
        'team.required'=> 'انتخاب تیم مربوط به خبر الزامی است',
        'tag.required'=> 'تگ های هر خبر باید انتخاب شوند',
        'category.required'=> 'دسته بندی های خبر باید وارد شوند',
        'newsImage.required'=> 'تصویر خبر رو وارد نکردی برادر!',
        'newsImage.image'=>'فایل حتما باید عکس باشه',
        'newsImage.max'=>'عکس حداکثر میتونه 1MB باشه :)',
        'editor1.required'=>'متن خبر باید نوشته شه!',
        'description.required'=>'متن خبر باید نوشته شه!',
        'description.min'=>'متن خبر باید حداقل 70 کاراکتر باشه',
        'description.max'=>'متن خبر باید حداکثر 320 کاراکتر باشه',

    ];

    public function render()
    {
        $this->tags=Tag::orderBy('id','desc')->get();
        $this->categories=Category::orderBy('id','desc')->get();
        $this->teams=Team::orderBy('id','desc')->get();
        return view('livewire.reporter.news-management.add-news',['tags'=>$this->tags,'categories'=>$this->categories,'teams'=>$this->teams]);
    }
}
