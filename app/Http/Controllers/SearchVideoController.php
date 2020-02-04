<?php

namespace App\Http\Controllers;

use App\Models\SearchVideo;
use Illuminate\Support\Facades\DB;

class SearchVideoController extends Controller
{
    public function index()
    {
        $products = SearchVideo::paginate(30);
        return view('SearchVideo')->with(['products' => $products]);

    }


    public function video($slug)
    {
        $video = SearchVideo::where('slug', 'like', $slug)->first();
        $photo = DB::table('media_libs')->where('have_videos_id', $video->id)->get();
        return view('ShowSearchVideo')->with(['video' => $video, 'photo' => $photo]);
    }


}
