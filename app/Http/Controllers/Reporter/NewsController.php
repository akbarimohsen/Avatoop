<?php

namespace App\Http\Controllers\Reporter;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateNewsRequest;
use App\Models\News;
use App\Models\Tag;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('reporter.news.index');

    }

    public function create()
    {
        return view('reporter.news.create');
    }


    public function store(CreateNewsRequest $request)
    {

        $temp = explode(' ', $request->NewsDate);
        $date = [
            'year' => explode('-',$temp[0])[0],
            'month' => explode('-',$temp[0])[1],
            'day' => explode('-',$temp[0])[2]
        ];

        $g_date_array = Verta::getGregorian($date['year'], $date['month'], $date['day']);
        $g_date = Carbon::create($g_date_array[0],$g_date_array[1],$g_date_array[2]);



//        $temp = explode(' ', $request->NewsDate);
//        $date = [
//            'year' => explode('-',$temp[0])[0],
//            'month' => explode('-',$temp[0])[1],
//            'day' => explode('-',$temp[0])[2]
//        ];
//
//        $g_date_array = Verta::getGregorian($date['year'], $date['month'], $date['day']);
//        $g_date = Carbon::create($g_date_array[0],$g_date_array[1],$g_date_array[2]);
//
//

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
        $news=News::findOrFail($id);
        return view('reporter.news.edit',compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news=News::findOrFail($id);
        $file=$request->file('newsImage');
        $imageName="";
        if(!empty($file)){
            $year=$news->created_at->year;
            $month=$news->created_at->month;
            $date=$year.'/'.$month;
            if (Storage::disk('public')->exists("news/$date/$news->img")){
                Storage::disk('public')->delete("news/$date/$news->img");
            }
            $imageName=time()."_".$request->file('newsImage')->getClientOriginalName();
            $dir="news/$date";
            $request->file('newsImage')->storeAs($dir,$imageName,'public');
        }else{
            $imageName=$news->img;
        }
        $updateNews=$news->update([
            'title' => $request->title,
            'header' => $request->header,
            'description' => $request->description,
            'NewsDate'=>$request->NewsDate,
            'body'=>$request->editor1,
            'img'=>"$imageName",
            'reporter_id' =>Auth::id()
        ]);
        if ($updateNews){
            $news->categories()->sync($request->category);
            $news->tags()->sync($request->tag);
            $news->teams()->sync($request->teams);
            session()->flash('delete','خبر با موفقیت آپدیت شد');
            return redirect()->route('news.index');
        }

    }


    public function destroy($id)
    {
        $news=News::findOrFail($id);
        $year=$news->created_at->year;
        $month=$news->created_at->month;
        $date=$year.'/'.$month;
        if (Storage::disk('public')->exists("news/$date/$news->img")){
            Storage::disk('public')->delete("news/$date/$news->img");
        }
        News::destroy($id);
        session()->flash('delete','خبر با موفقیت حذف شد');
        return redirect()->route('news.index');

    }
}
