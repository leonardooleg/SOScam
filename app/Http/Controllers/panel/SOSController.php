<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\HaveVideo;
use App\Models\MediaLib;
use App\Models\SearchVideo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SOSController extends Controller
{
    public function have()
    {
        return view('panel.haveSOScam');
    }

    public function haveEdit($id)
    {
        $video = HaveVideo::where('id', $id)->first();
        if ($video->user != Auth::user()->id) abort(403, 'Недійсна сторінка');

        $medias = MediaLib::where('have_videos_id', $id)->where('media', 1)->get();
        return view('panel.haveSOScam', [
            'video' => $video,
            'medias' => $medias
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HaveVideo $HaveVideo
     * @return Response
     */
    public function haveStore(Request $request)
    {
        HaveVideo::videoStore($request);
        return redirect()->route('SOS');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HaveVideo $HaveVideo
     * @return Response
     */
    public function haveUpdate(Request $request, $HaveVideo)
    {
        /* if($HaveVideo->user!=Auth::user()->id) abort(403, 'Недійсна сторінка');*/
        HaveVideo::videoUpdate($HaveVideo, $request);
        return back()->with('success', 'Your article has been added successfully. Please wait for the admin to approve.');
    }

    public function search()
    {
        return view('panel.seachSOScam');
    }

    public function searchEdit($id)
    {
        $video = SearchVideo::where('id', $id)->first();
        if ($video->user != Auth::user()->id) abort(403, 'Недійсна сторінка');
        $medias = MediaLib::where('have_videos_id', $id)->where('media', 2)->get();
        return view('panel.searchSOScam', [
            'video' => $video,
            'medias' => $medias
        ]);
    }

    public function searchStore(Request $request)
    {
        SearchVideo::videoStore($request);
        return redirect()->route('SOS');
    }

    public function searchUpdate(Request $request, $SearchVideo)
    {
        SearchVideo::videoUpdate($request, $SearchVideo);
        return redirect()->route('SOS');
    }

    public function index()
    {
        $HaveVideos = DB::table('have_videos')
            ->leftJoin('media_libs', function ($join) {
                $join->on('have_videos.id', '=', 'media_libs.have_videos_id')
                    ->select('link');
            })
            ->distinct()
            ->whereIn('media_libs.ID', [DB::raw('select min(ID) from media_libs group by media_libs.have_videos_id')])
            ->where('have_videos.user', '=', Auth::user()->id)
            ->select('media_libs.link', 'have_videos.*')
            ->orderBy('have_videos.created_at', 'desc')
            ->simplePaginate(15);


        return view('panel.index', [
            'HaveVideos' => $HaveVideos,
            'SearchVideo' => SearchVideo::where('user', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('panel.profile', [
            'user' => $user,
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $avatar = $request->file('avatar'); //при завантажені файлів
        if ($avatar) {
            $data = "/" . $avatar->store('uploads/avatar', 'public');
            $insert_media = $user->avatar = $data;
        }
        if ($request->Twitter) {
            $user->Twitter = $request->Twitter;
        }
        if ($request->Facebook) {
            $user->Facebook = $request->Facebook;
        }
        if ($request->Youtube) {
            $user->Youtube = $request->Youtube;
        }
        if ($request->Instagram) {
            $user->Instagram = $request->Instagram;
        }
        if ($request->phone) {
            $user->phone = $request->phone;
        }
        $user->save();
        return view('panel.profile', [
            'user' => $user,
        ]);
    }

}
