<?php

namespace App\Http\Controllers\Admin;

use ad\Youtube\YoutubeAPI;
use App\Http\Controllers\Controller;
use App\Models\HaveVideo;
use App\Models\MediaLib;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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


        $HaveVideo = new HaveVideo();
        $HaveVideo->title = $request->title;
        $HaveVideo->published = $request->published;
        $HaveVideo->slug = Str::slug(mb_substr($request->title, 0, 40) . "-" . Carbon::now()->format('dmyHi'), '-');
        $HaveVideo->description_short = $request->description_short;
        $HaveVideo->description = $request->description;
        $HaveVideo->lat = $request->lat;
        $HaveVideo->lng = $request->lng;
        $HaveVideo->city = $request->city;
        $HaveVideo->region = $request->region;
        $HaveVideo->country = $request->country;
        $HaveVideo->date = $request->date;
        $HaveVideo->meta_title = $request->meta_title;
        $HaveVideo->meta_description = $request->meta_description;
        $HaveVideo->meta_keyword = $request->meta_keyword;
        $HaveVideo->save();
        // Now add tags
        $HaveVideo->tag(explode(',', $request->tags));
        $media_photo = $request->file('media_photo');
        if ($media_photo) {
            foreach ($request->file('media_photo') as $file) {
                $data = "/" . $file->store('uploads/HaveVideo', 'public');
                $insert_media = MediaLib::updateOrCreate(
                    ['have_videos_id' => $HaveVideo->id, 'link' => $data, 'type' => 1, 'media' => 1]
                );
            }
        }

        if ($request->media_video != '') {
            foreach ($request->media_video as $link) {
                if ($link) {
                    $insert_media = MediaLib::updateOrCreate(
                        ['have_videos_id' => $HaveVideo->id, 'link' => $link, 'type' => 2, 'media' => 1]
                    );
                }
            }
        }
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
    public function update(Request $request, HaveVideo $HaveVideo)
    {

        $HaveVideo = HaveVideo::find($HaveVideo->id);
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
                    ['have_videos_id' => $HaveVideo->id, 'link' => $data, 'type' => 1]
                );
            }
        }

        $video_file = $request->file('video_file');
        if ($video_file) {
            $fullPathToVideo = $video_file->store('uploads/HaveVideo/upload', 'public');


            $url = Storage::url($fullPathToVideo, 'public');
            $url = Storage::path($fullPathToVideo, 'public');
            $url = str_replace("/", "\\", $url);
            $url = str_replace("app\\", "app\public\\", $url);
            /*$params = [
                'title'       => 'My Awesome Video',
                'description' => 'You can also specify your video description here.',
                'tags'	      => ['foo', 'bar', 'baz'],
                'category_id' => 10
            ];*/

            $fc = YoutubeAPI::upload($url, [
                'title' => 'My Awesome Video',
                'description' => 'You can also specify your video description here.',
                'tags' => ['foo', 'bar', 'baz'],
                'category_id' => 10
            ]);

            $video = $fc->getVideoId();


            $insert_media = MediaLib::updateOrCreate(
                ['have_videos_id' => $HaveVideo->id, 'link' => $video->getVideoId(), 'type' => 2]
            );
        }

        if ($request->media_video != '') {
            foreach ($request->media_video as $link) {
                if ($link) {
                    $insert_media = MediaLib::updateOrCreate(
                        ['have_videos_id' => $HaveVideo->id, 'link' => $link, 'type' => 2]
                    );
                }
            }
        }

        // Now add tags
        $HaveVideo->tag(explode(',', $request->tags));
        $HaveVideo->published = $request->published;
        $HaveVideo->title = $request->title;
        $HaveVideo->description_short = $request->description_short;
        $HaveVideo->description = $request->description;
        $HaveVideo->lat = $request->lat;
        $HaveVideo->lng = $request->lng;
        $HaveVideo->city = $request->city;
        $HaveVideo->region = $request->region;
        $HaveVideo->country = $request->country;
        $HaveVideo->date = $request->date;
        $HaveVideo->meta_title = $request->meta_title;
        $HaveVideo->meta_description = $request->meta_description;
        $HaveVideo->meta_keyword = $request->meta_keyword;
        $HaveVideo->save();

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
