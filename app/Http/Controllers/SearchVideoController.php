<?php

namespace App\Http\Controllers;

use App\Models\SearchVideo;
use Illuminate\Support\Facades\DB;

class SearchVideoController extends Controller
{
    public function index()
    {
        $products = SearchVideo::all();
        return view('SearchVideo')->with(['products' => $products]);

    }


    public function video($slug)
    {
        $video = SearchVideo::where('slug', 'like', $slug)->first();
        $photo = DB::table('media_libs')->where('have_videos_id', $video->id)->get();
        return view('ShowHaveVideo')->with(['video' => $video, 'photo' => $photo]);
    }


}
