<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rss\CreateRssRequest;
use App\Models\Admin\Rss;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class RssController extends Controller
{

    public function index()
    {

        $search=\request('search-rss');
        if ($search!==null){
            $Rsses=Rss::orderBy('active','DESC')->where(function ($query) use ($search) {
                $query->where('title','LIKE',"%{$search}=%")->orWhere(function ($query) use ($search) {
                    $query->where('description','LIKE',"%{$search}%");
                });
            })->with('categories','tags','rss_comments','teams','likers')->paginate(27);

        }else{
            $Rsses=Rss::orderBy('active','DESC')->with('categories','tags','rss_comments','teams','likers')->paginate(27);

        }
        return view('admin.rsses.index',compact('Rsses'));
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show(Rss $rss)
    {

    }


    public function edit($id)
    {
        $rss=Rss::findOrFail($id);
        return view('admin.rsses.edit',compact('rss'));
    }

    public function update(CreateRssRequest $request,$id)
    {
        dd('ok');
        $news=Rss::findOrFail($id);

        $file=$request->file('rssImage');
        $imageName="";
        if(!empty($file)){
            $year=$news->created_at->year;
            $month=$news->created_at->month;
            $date=$year.'/'.$month;
            if (Storage::disk('public')->exists("rss/$date/$news->img")){
                Storage::disk('public')->delete("rss/$date/$news->img");
            }
            $imageName=time()."_".$request->file('rssImage')->getClientOriginalName();
            $dir="rss/$date";
            $request->file('rssImage')->storeAs($dir,$imageName,'public');
        }else{
            $imageName=$news->img;
        }
        $updateNews=$news->update([
            'title' => $request->title,
            'description' => $request->description,
            'content'=>$request->editor1,
            'img'=>"$imageName",
        ]);
        if ($updateNews){
            $news->categories()->sync($request->category);
            $news->tags()->sync($request->tag);
            $news->teams()->sync($request->teams);
            session()->flash('delete','خبر با موفقیت آپدیت شد');
            return redirect()->route('rss.index');
        }

    }

    public function destroy($id)
    {

    }

}
