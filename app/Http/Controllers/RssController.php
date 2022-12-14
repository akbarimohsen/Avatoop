<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rss\CreateRssRequest;
use App\Models\Admin\Rss;
use App\Http\Controllers\Controller;
use App\Models\Admin\RssAudio;
use App\Models\News;
use App\Models\User;
use App\Models\Visit;
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
            if (Storage::exists("$news->img")){
                Storage::delete("$news->img");
            }
            $imageName=time()."_".$request->file('rssImage')->getClientOriginalName();
            $dir="rss/$date";
            $request->file('rssImage')->storeAs($dir,$imageName);
        }else{
            $imageName=$news->img;
        }
        if(!empty($voiceFile)){
            if (Storage::exists("$audio")){
                Storage::delete("$audio");
            }
            $audioName=time()."_".$request->file('rssAudio')->getClientOriginalName();
            $dirAudio="audio/rss/$date";
            $request->file('rssAudio')->storeAs($dirAudio,$audioName);
        }else{
            if ($news->rss_audio==null){
                $audioName=null;
            }else{
                $audioName=$news->rss_audio->audio;
            }
        }
        $updateNews=$news->update([
            'title' => $request->title,
            'description' => $request->description,
            'content'=>$request->editor1,
            'img'=>!empty($file)?$dir.'/'.$imageName:$imageName,
            'active'=>true,
        ]);
        if ($updateNews){
            $DBAudioExist=RssAudio::where('rss_id',$news->id)->exists();
            if ($DBAudioExist){
                RssAudio::where('rss_id',$news->id)->update([
                    'audio'=>!empty($voiceFile)?$dirAudio.'/'.$audioName:$audioName,
                ]);
            }else{
                $RssAudio=new RssAudio();
                $dirAudio="audio/rss/$date";
                $RssAudio->audio="$dirAudio/$audioName";
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
        $audio=$news->rss_audio->audio;
        if (Storage::exists("$news->img")){
            Storage::delete("$news->img");
        }
        if (Storage::exists("$audio")){
            Storage::delete("$audio");
        }
        Rss::destroy($id);
        session()->flash('delete','خبر با موفقیت حذف شد');
        return redirect()->route('rss.index');
    }

    public function rssUserIp(Request $request)
    {
        // return $request;
        $rsscheck = Visit::whereIn('user_ip', $request->rss)->get(
            ['rss_id', 'created_at']
        );

         return response()->json([
            'rsscheck' => $rsscheck
         ]);
    }

}
