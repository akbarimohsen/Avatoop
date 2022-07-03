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
    public News $news;
    public $avatar;
    public $tags;
    public $categories;
    public $teams;

    public function mount()
    {
        $this->news=new News();
    }
    protected $rules = [
        'news.title' => 'required',
        'news.header' => 'required',
        'news.description' => 'required|min:70|max:320',
        'news.NewsDate' => 'required',
        'news.team'=> '',
        'news.tag'=> '',
        'news.category'=> '',
        'avatar'=> 'required|image|max:1000',//1MB
        'news.editor1'=>'required'
    ];
    protected $messages = [

        'news.title.required' => 'فیلد عنوان اجباری است',
        'news.header.required' => 'فیلد سرتیتر خبر اجباری است',
        'news.NewsDate.required' => 'فیلد تاریخ خبر باید وارد شود',
        'news.team.required'=> 'انتخاب تیم مربوط به خبر الزامی است',
        'news.tag.required'=> 'تگ های هر خبر باید انتخاب شوند',
        'news.category.required'=> 'دسته بندی های خبر باید وارد شوند',
        'avatar.required'=> 'تصویر خبر رو وارد نکردی برادر!',
        'avatar.image'=>'فایل حتما باید عکس باشه',
        'avatar.max'=>'عکس حداکثر میتونه 1MB باشه :)',
        'news.editor1.required'=>'متن خبر باید نوشته شه!',
        'news.description.required'=>'متن خبر باید نوشته شه!',
        'news.description.min'=>'متن خبر باید حداقل 70 کاراکتر باشه',
        'news.description.max'=>'متن خبر باید حداکثر 320 کاراکتر باشه',

    ];

    public function handleAvatarUpload()
    {
        $year=now()->year;
        $month=now()->month;
        $dir="news/$year/$month";
        $name=rand(100,10000)."_".$this->avatar->getClientOriginalName();
        $this->avatar->storeAs($dir,$name);
        return "$dir/$name";
    }

    public function addNews()
    {
        $this->validate();
        $this->news->avatar=$this->handleAvatarUpload();

        $this->news->save();
    }
    public function render()
    {
        $this->tags=Tag::orderBy('id','desc')->get();
        $this->categories=Category::orderBy('id','desc')->get();
        $this->teams=Team::orderBy('id','desc')->get();
        return view('livewire.reporter.news-management.add-news',['tags'=>$this->tags,'categories'=>$this->categories,'teams'=>$this->teams]);
    }
}
