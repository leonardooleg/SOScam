<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HaveVideo;
use App\Models\MediaLib;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HaveVideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:admin', ['only' => ['index', 'show', 'create', 'edit', 'update', 'store', 'destroy']]);
        $this->middleware('permission:video-list|video-create|video-edit|video-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:video-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:video-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:video-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.have-video.index', [
            'videos' => HaveVideo::orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {


        return view('admin.have-video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param App\Traits\UploadTrait\uploadImage uploadOne
     * @return Response
     */
    public function store(Request $request)
    {

        HaveVideo::videoStore($request);
        return redirect()->route('admin.have-video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param HaveVideo $HaveVideo
     * @return Response
     */
    public function show(HaveVideo $HaveVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HaveVideo $HaveVideo
     * @return Response
     */
    public function edit(HaveVideo $HaveVideo)
    {
        $video = HaveVideo::where('id', $HaveVideo->id)->first();
        $medias = MediaLib::where('have_videos_id', $HaveVideo->id)->where('media', 1)->get();
        return view('admin.have-video.edit', [
            'video' => $video,
            'medias' => $medias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param HaveVideo $HaveVideo
     * @return Response
     * @throws Exception
     */
    public function update(Request $request, $HaveVideo)
    {

        HaveVideo::videoUpdate($HaveVideo, $request);

        return back()->with('success', 'Your article has been added successfully. Please wait for the admin to approve.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HaveVideo $HaveVideo
     * @return Response
     *
     * @throws Exception
     */
    public function destroy(HaveVideo $HaveVideo)
    {
        $HaveVideo->categories()->detach();
        $HaveVideo->delete();

        return redirect()->route('admin.have-video.index');
    }
}
