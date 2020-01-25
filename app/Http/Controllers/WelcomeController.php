<?php

namespace App\Http\Controllers;

use App\Models\HaveVideo;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = HaveVideo::all();
        return view('welcome')->with(['products' => $products]);
    }

    public function greeting()
    {
        return view('greeting');
    }
}
