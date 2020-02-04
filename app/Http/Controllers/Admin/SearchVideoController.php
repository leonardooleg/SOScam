<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\MediaLib;
use App\Models\SearchVideo;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

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
        $SearchVideo = new SearchVideo();
        $SearchVideo->title = $request->title;
        $SearchVideo->published = $request->published;
        $SearchVideo->slug = Str::slug(mb_substr($request->title, 0, 40) . "-" . Carbon::now()->format('dmyHi'), '-');
        $SearchVideo->description_short = $request->description_short;
        $SearchVideo->description = $request->description;
        $SearchVideo->lat = $request->lat;
        $SearchVideo->lng = $request->lng;
        $SearchVideo->city = $request->city;
        $SearchVideo->region = $request->region;
        $SearchVideo->country = $request->country;
        $SearchVideo->radius = $request->radius;
        $SearchVideo->date = $request->date;
        $SearchVideo->time = $request->time;
        $SearchVideo->meta_title = $request->meta_title;
        $SearchVideo->meta_description = $request->meta_description;
        $SearchVideo->meta_keyword = $request->meta_keyword;
        $SearchVideo->save();
        // Now add tags
        $SearchVideo->tag(explode(',', $request->tags));
        $media_photo = $request->file('media_photo');
        if ($media_photo) {
            foreach ($request->file('media_photo') as $file) {
                $data = "/" . $file->store('uploads/HaveVideo', 'public');
                $insert_media = MediaLib::updateOrCreate(
                    ['have_videos_id' => $SearchVideo->id, 'link' => $data, 'type' => 1, 'media' => 2]
                );
            }
        }

        if ($request->media_video != '') {
            foreach ($request->media_video as $link) {
                if ($link) {
                    $insert_media = MediaLib::updateOrCreate(
                        ['have_videos_id' => $SearchVideo->id, 'link' => $link, 'type' => 2, 'media' => 2]
                    );
                }
            }
        }
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
        $SearchVideo = SearchVideo::find($id);
        /*$image = $request->file('media_photo');
        if ($image){
            $upload=$request->file('media_photo')->store('uploads/HaveVideo', 'public');
            if ($upload){
                $HaveVideo->image = $upload;
            }
        }*/
        $media_photo = $request->file('media_photo');
        if ($media_photo) {
            foreach ($request->file('media_photo') as $file) {
                $data = "/" . $file->store('uploads/HaveVideo', 'public');
                $insert_media = MediaLib::updateOrCreate(
                    ['have_videos_id' => $SearchVideo->id, 'link' => $data, 'type' => 1]
                );
            }
        }

        if ($request->media_video != '') {
            foreach ($request->media_video as $link) {
                if ($link) {
                    $insert_media = MediaLib::updateOrCreate(
                        ['have_videos_id' => $SearchVideo->id, 'link' => $link, 'type' => 2]
                    );
                }
            }
        }

        // Now add tags
        $SearchVideo->tag(explode(',', $request->tags));
        $SearchVideo->published = $request->published;
        $SearchVideo->title = $request->title;
        $SearchVideo->description_short = $request->description_short;
        $SearchVideo->description = $request->description;
        $SearchVideo->lat = $request->lat;
        $SearchVideo->lng = $request->lng;
        $SearchVideo->city = $request->city;
        $SearchVideo->region = $request->region;
        $SearchVideo->country = $request->country;
        $SearchVideo->radius = $request->radius;
        $SearchVideo->date = $request->date;
        $SearchVideo->time = $request->time;
        $SearchVideo->meta_title = $request->meta_title;
        $SearchVideo->meta_description = $request->meta_description;
        $SearchVideo->meta_keyword = $request->meta_keyword;
        $SearchVideo->save();

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
