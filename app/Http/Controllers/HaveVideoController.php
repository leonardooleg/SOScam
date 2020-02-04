<?php

namespace App\Http\Controllers;

use App\Models\HaveVideo;
use Illuminate\Support\Facades\DB;

class HaveVideoController extends Controller
{
    public function index()
    {
        $products = HaveVideo::paginate(30);//потрібно картинки додати
        return view('HaveVideo')->with(['products' => $products]);

    }


    public function video($slug)
    {
        $video = HaveVideo::where('slug', 'like', $slug)->first();
        $photo = DB::table('media_libs')->where('have_videos_id', $video->id)->get();
        return view('ShowHaveVideo')->with(['video' => $video, 'photo' => $photo]);
    }


}
