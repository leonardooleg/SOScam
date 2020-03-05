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
        $video = SearchVideo::where('slug', $slug)->first();
        $photo = DB::table('media_libs')->where('have_videos_id', $video->id)->where('media', 2)->get();
        $top = SearchVideo::orderBy('viewed', 'desc')->limit(4)->get();
        $contact = DB::table('users')->where('id', $video->user)->first();
        return view('ShowSearchVideo')->with(['video' => $video, 'photo' => $photo, 'tops' => $top, 'contact' => $contact]);
    }


}
