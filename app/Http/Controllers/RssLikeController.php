<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Admin\Rss;

use App\Models\liker_rss;
use App\Models\User\like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RssLikeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    public function store($id, Request $request)
    {
        $product = Rss::where(['id' => $id])->get()->first();
        if ($product->likedBy($request->user())) {
            return response(null, 400);
        };
        $product->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        $like = like::where('rss_id', $product->id)->pluck('id');
        $likecounter = $like->count();
        return response()->json([
            'like counter' => $likecounter,
        ]);
    }
    public function destroy($id, Request $request)
    {
        $product = Rss::where(['id' => $id])->get()->first();
        $request->user()->likes()->where('rss_id', $product->id)->delete();

        return response()->json([
            'MSG' => 'this work was suuccefully',
        ]);
    }

    public function showprolike($id)
    {
        $detail = like::where('rss_id', $id)->pluck('id');
        $likes = $detail->count();
        return response()->json([
            'like' => $likes
        ]);
    }

    // public function productlikeshow(Request $request)
    // {

    //     $article = Products::whereIn('slug', $request->products)->get(['id']);

    //     $finds = Products::find($article);
    //     $mappedcollection = $finds->map(function ($find, $key) {
    //         return [
    //             'like' => like::where('product_id', $find->id)->get()->count()
    //         ];
    //     });
    //     return response()->json([
    //         'likecounter' => $mappedcollection
    //     ]);
    // }

    public function rssliketest($id)
    {
       // try {
            $user = Auth::user();

            
            //return $productid;

            $likeshow = like::where('rss_id', $id)->where('user_id', $user->id)->get()->first();
            //return $likeshow;
            if ($likeshow == NULL) {
                return response()->json([
                    'MSG' => 'لایک نکرده است',
                ], 400);
            }

            return response()->json([
                'likeShow' => 200
            ]);
        // } catch (\Exception $ex) {
        //     return response()->json([
        //         'MSG' => 'this work wasnt work successfully',
        //     ], 400);
        // }
    }
}
