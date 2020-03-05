<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Newsletter;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('SOS');
    }

    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribePending($request->email);
            return Redirect::to(URL::previous() . "#newsletter")->with('success', 'Перевірте свою пошту');
        }
        return Redirect::to(URL::previous() . "#newsletter")->with('failure', 'Вибачте! Щось пішло не так, спробуйте ще ');

    }
}
