<?php

namespace App\Http\Controllers;


class SOSController extends Controller
{
    public function have()
    {
        return view('panel.haveSOScam');
    }

    public function sos()
    {
        return view('panel.SOScam');
    }

    public function index()
    {
        return view('panel.index');
    }
}
