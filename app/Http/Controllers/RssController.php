<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rss\CreateRssRequest;
use App\Models\Admin\Rss;
use App\Http\Controllers\Controller;
use App\Models\Admin\RssAudio;
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
            $Rsses=Rss::orderBy('active','asc')->with('categories','tags','rss_comments','teams','likers')->paginate(27);

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
        $news=Rss::findOrFail($id);
        $file=$request->file('rssImage');
        $voiceFile=$request->file('rssAudio');
        $year=$news->created_at->year;
        $month=$news->created_at->month;
        $date=$year.'/'.$month;
        if ($news->rss_audio==null){
            $audio='nothing';
        }else{
            $audio=$news->rss_audio->audio;

        }
        $imageName="";
        $audioName="";
        if(!empty($file)){
            if (Storage::disk('public')->exists("rss/$date/$news->img")){
                Storage::disk('public')->delete("rss/$date/$news->img");
            }
            $imageName=time()."_".$request->file('rssImage')->getClientOriginalName();
            $dir="rss/$date";
            $request->file('rssImage')->storeAs($dir,$imageName,'public');
        }else{
            $imageName=$news->img;
        }
        if(!empty($voiceFile)){
            if (Storage::disk('public')->exists("audio/rss/$date/$audio")){
                Storage::disk('public')->delete("audio/rss/$date/$audio");
            }
            $audioName=time()."_".$request->file('rssAudio')->getClientOriginalName();
            $dir="audio/rss/$date";
            $request->file('rssAudio')->storeAs($dir,$audioName,'public');
        }else{
            $audioName=$news->rss_audio->audio;
        }
        $updateNews=$news->update([
            'title' => $request->title,
            'description' => $request->description,
            'content'=>$request->editor1,
            'img'=>"$imageName",
            'active'=>true,
        ]);
        if ($updateNews){
            $DBAudioExist=RssAudio::where('rss_id',$news->id)->exists();
            if ($DBAudioExist){
                RssAudio::where('rss_id',$news->id)->update([
                    'audio'=>$audioName
                ]);
            }else{
                $RssAudio=new RssAudio();
                $RssAudio->audio=$audioName;
                $news->rss_audio()->save($RssAudio);
            }
            $news->categories()->sync($request->category);
            $news->tags()->sync($request->tag);
            $news->teams()->sync($request->teams);
            session()->flash('delete','خبر با موفقیت آپدیت شد');
            return redirect()->route('rss.index');
        }
    }

    public function destroy($id)
    {
        $news=Rss::findOrFail($id);
        $year=$news->created_at->year;
        $month=$news->created_at->month;
        $date=$year.'/'.$month;
        if (Storage::disk('public')->exists("rss/$date/$news->img")){
            Storage::disk('public')->delete("rss/$date/$news->img");
        }
        Rss::destroy($id);
        session()->flash('delete','خبر با موفقیت حذف شد');
        return redirect()->route('rss.index');
    }

}
