<?php

namespace App\Http\Controllers;

use App\Models\HaveVideo;
use App\Models\SearchVideo;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $HaveVideos = HaveVideo::latest()->limit(6)->get();
        $SearchVideos = SearchVideo::latest()->limit(3)->get();
        return view('welcome')->with(['HaveVideos' => $HaveVideos, 'SearchVideos' => $SearchVideos]);
    }
}
