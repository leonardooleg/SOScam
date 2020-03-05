<?php

namespace App\Http\Controllers;

use App\Models\HaveVideo;
use Illuminate\Support\Facades\DB;

class HaveVideoController extends Controller
{
    public function index()
    {
        $products = DB::table('have_videos')
            ->leftJoin('media_libs', function ($join) {
                $join->on('have_videos.id', '=', 'media_libs.have_videos_id')
                    ->select('link');
            })
            ->distinct()
            ->whereIn('media_libs.ID', [DB::raw('select min(ID) from media_libs group by media_libs.have_videos_id')])
            ->select('media_libs.link', 'have_videos.*')
            ->orderBy('have_videos.created_at', 'desc')
            ->simplePaginate(15);

        return view('HaveVideo')->with(['products' => $products]);

    }


    public function video($slug)
    {
        $video = HaveVideo::where('slug', 'like', $slug)->first();
        $photo = DB::table('media_libs')->where('have_videos_id', $video->id)->where('media', 1)->get();
        return view('ShowHaveVideo')->with(['video' => $video, 'photo' => $photo]);
    }


}
