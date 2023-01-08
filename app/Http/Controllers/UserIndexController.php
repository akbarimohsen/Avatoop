<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Admin\Rss;
use App\Models\Admin\RssComment;
use App\Models\Comment;
use App\Models\Suggest;
use App\Models\User\like;
use App\Models\Visit;
use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    public function indexSlider()
    {
        $datas = Rss::select('id')->where('active', 1)->orderBy('created_at', 'desc')->limit(7)->get();
        $rsss = Rss::find($datas);
        $mappedcollection = $rsss->map(function ($rss, $key) {
            return [
                'id' => $rss->id,
                'img' => $rss->img,
                'title' => $rss->title,
            ];
        });
        return response()->json([
            'data' => $mappedcollection
        ]);
    }

    public function indexadds()
    {
        $datas = Ad::select('id')->get();

        $rsss = Ad::find($datas);
        $mappedcollection = $rsss->map(function ($rss, $key) {
            return [
                'img' => $rss->img,
                'link' => $rss->link
            ];
        });
        return response()->json([
            // 'slider' => $rsss,
            // 'slidertitle' => $title
            'data' => $mappedcollection
        ]);
    }
    public function indexnews()
    {
        $datas = Rss::orderBy('created_at', 'desc')->select('id')->limit(23)->get();

        $rsss = Rss::find($datas);
        //        $visits=Visit::where();
        $mappedcollection = $rsss->map(function ($rss, $key) {
            $visit = "";
            return [
                'id' => $rss->id,
                'image' => $rss->img,
                'title' => $rss->title,
                'description' => $rss->description,
                'news_date' => $rss->news_date,
                'rss_audio' => $rss->audio,
                'visit' => Visit::where('rss_id', $rss->id)->where('user_ip', \request()->ip())->exists() ? true : null
            ];
        });
        return response()->json([
            'data' => $mappedcollection
        ]);
    }

    public function andriodIndexnews(Request $request)
    {
        $rsses = Rss::withCount('rss_comments')
            ->withCount('likes')
            ->with('visits', fn ($query) => $query->where('user_ip', $request->ip()))
            ->latest()
            ->get()
            ->map(fn ($rss) => [
                'id' => $rss->id,
                'image' => $rss->img,
                'title' => $rss->title,
                'description' => $rss->description,
                'news_date' => $rss->news_date,
                'rss_audio' => $rss->audio,
                'like' => $rss->likes_count,
                'commentCount' => $rss->rss_comments_count,
                'visit' => $rss->visits->contains('user_ip', $request->ip())
            ])
            ->paginate(10);

        return response()->json([
            'data' => $rsses,
        ]);
    }
    public function topview()
    {
        $datas = Rss::orderBy('views_count', 'DESC')->where('active', 1)->select('id')->limit(23)->get();
        $rsss = Rss::find($datas);
        $mappedcollection = $rsss->map(function ($rss, $key) {
            return [
                'id' => $rss->id,
                'image' => $rss->img,
                'title' => $rss->title,
                'description' => $rss->description,
                'news_date' => $rss->news_date,
                'rss_audio' => $rss->audio
            ];
        });
        return response()->json([
            'data' => $mappedcollection
        ]);
    }
    public function suggestion(Request $request)
    {
        $this->validate($request, [
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

        $data = Rss::with('categories', 'tags', 'teams')->findOrFail($id);
        $data->increment('views_count');
        $collection = collect($data);
        $filtered = $collection->except(['id']);
        $rss = RssComment::where('rss_id', $id)->where('status', 1)->get(['title', 'comment', 'created_at']);
        $countLikes = like::where('rss_id', $id)->count();
        // return $data->title;
        $visit = Visit::create([
            'user_ip' => request()->ip(),
            'rss_id' => $id,
            'title' => $data->title
        ]);
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
