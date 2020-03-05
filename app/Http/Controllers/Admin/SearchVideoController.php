<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\MediaLib;
use App\Models\SearchVideo;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*use Illuminate\Http\Request;*/

class SearchVideoController extends Controller
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
        return view('admin.search-video.index', [
            'videos' => SearchVideo::orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.search-video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        SearchVideo::videoStore($request);
        return redirect()->route('admin.search-video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $video = SearchVideo::where('id', $id)->first();
        $medias = MediaLib::where('have_videos_id', $id)->where('media', 2)->get();
        return view('admin.search-video.edit', [
            'video' => $video,
            'medias' => $medias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        SearchVideo::videoUpdate($request, $id);
        return back()->with('success', 'Your article has been added successfully. Please wait for the admin to approve.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy(SearchVideo $SearchVideo)
    {
        $SearchVideo->categories()->detach();
        $SearchVideo->delete();

        return redirect()->route('admin.search-video.index');
    }
}
