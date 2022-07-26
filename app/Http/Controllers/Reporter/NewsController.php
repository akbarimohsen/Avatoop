<?php

namespace App\Http\Controllers\Reporter;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateNewsRequest;
use App\Models\News;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('reporter.news.create');
    }


    public function store(CreateNewsRequest $request)
    {
        if($request->has('newsImage')){

            $newsImage = time()."_".$request->file('newsImage')->getClientOriginalName();
            $year=now()->year;
            $month=now()->month;
            $dir=$year.'/'.$month;
            $request->file('newsImage')->storeAs("news/$dir",$newsImage,'public');
        }

        $news=News::create([
            'title' => $request->title,
            'header' => $request->header,
            'description' => $request->description,
            'NewsDate'=>$request->NewsDate,
            'body'=>$request->editor1,
            'img'=>"$newsImage",
            'reporter_id' =>Auth::id()
        ]);
        if ($news){
            $news->categories()->attach($request->category);
            $news->tags()->attach($request->tag);
            $news->teams()->attach($request->team);
        }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
