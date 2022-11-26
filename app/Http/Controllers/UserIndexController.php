<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Admin\Rss;
use App\Models\Admin\RssComment;
use App\Models\Comment;
use App\Models\Suggest;
use App\Models\User\like;
use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    public function indexSlider()
    {
        $datas = Rss::select('id')->orderBy('created_at', 'desc')->get();
        $Finds = Rss::find($datas);
        $mappedcollection = $Finds->map(function ($Find, $key) {
            return [
                'img' => $Find->img,
                'title' => $Find->title
            ];
        });
        return response()->json([
            'data' => $mappedcollection
        ]);
    }

    public function indexadds()
    {
        $datas = Ad::select('id')->get();

        $Finds = Ad::find($datas);
        $mappedcollection = $Finds->map(function ($Find, $key) {
            return [
                'img' => $Find->img,
                'link' => $Find->link
            ];
        });
        return response()->json([
            // 'slider' => $Finds,
            // 'slidertitle' => $title
            'data' => $mappedcollection
        ]);
    }
    public function indexnews()
    {
        $datas = Rss::orderBy('created_at', 'desc')->select('id')->limit(23)->get();
        $Finds = Rss::find($datas);
        $mappedcollection = $Finds->map(function ($Find, $key) {
            return [
                'id'=>$Find->id,
                'title' => $Find->title,
                'description' => $Find->description,
                'news_date' => $Find->news_date,
            ];
        });
        return response()->json([
            'data' => $mappedcollection
        ]);
    }
    public function topview()
    {
        $datas = Rss::orderBy('views_count','DESC')->limit(23)->get(['id','title','description','news_date']);
        return response()->json([
            'data' => $datas
        ]);
    }
    public function suggestion(Request $request)
    {
       $this->validate($request,[
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => 'required|email',
           'description' => 'required|string'
       ]);

       $data = new Suggest();
       $data->first_name = $request->first_name;
       $data->last_name = $request->last_name;
       $data->email = $request->email;
       $data->description = $request->description;
       $data->save();
       return response()->json([
          'Suggestion' => 'با موفقیت ذخیره شد'
       ]);
    }

    public function newsShow($id)
    {

        $data = Rss::with('rss_audio','categories','tags','teams')->findOrFail($id);
        $data->increment('views_count');
        $collection = collect($data);
        $filtered = $collection->except(['id']);
        $rss = RssComment::where('rss_id', $id)->where('status', 1)->get(['title', 'comment', 'created_at']);
        $countLikes=like::where('rss_id', $id)->count();
         return response()->json([
             'rss' => $filtered,
             'comment' => $rss,
             'countLikes' => $countLikes
         ]);

    }

    public function bookMark(Request $request)
    {
        $product = Rss::whereIn('id', $request->rss)->get(
            ['title', 'description', 'news_date', 'active', 'content', 'views_count', 'img', 'created_at']
        );

         return response()->json([
            'product' => $product
         ]);
    }
}
