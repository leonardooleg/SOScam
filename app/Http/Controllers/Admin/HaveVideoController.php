<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HaveVideo;
use App\Models\MediaLib;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HaveVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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


        return view('admin.have-video.create', [
            'HaveVideo' => [],

            'delimiter' => ''
        ]);
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
        // Form validation
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $HaveVideo = new HaveVideo($request->all());

        $image = $request->file('image');
        if ($image) {
            $upload = $request->file('image')->store('uploads/HaveVideo', 'public');
            if ($upload) {
                $HaveVideo->image = $upload;
            }
        }
        $next_images = $request->file('next_images');
        if ($next_images) {
            foreach ($request->file('next_images') as $file) {
                $data[] = $file->store('uploads/HaveVideo', 'public');
            }
            $HaveVideo->next_images = json_encode($data);
        }

        $HaveVideo->save();
        // Categories
        if ($request->input('categories')) :
            $HaveVideo->categories()->attach($request->input('categories'));
        endif;
        if ($textileables = $request->input('textileable')) :
            $deletedRows = Textileable::where('HaveVideos_id', $HaveVideo->id)->delete();
            foreach ($textileables as $textileable) {
                if ($textileable == $request->input('by_default')) {
                    $insert_textileable = Textileable::updateOrCreate(
                        ['HaveVideos_id' => $HaveVideo->id, 'textiles_id' => $textileable, 'by_default' => 1]
                    );
                } else {
                    $insert_textileable = Textileable::updateOrCreate(
                        ['HaveVideos_id' => $HaveVideo->id, 'textiles_id' => $textileable]
                    );
                }
                $insert_textileable->save();
            }
        endif;

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
        $medias = MediaLib::where('have_videos_id', $HaveVideo->id)->get();
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

        $HaveVideo->title = $request->title;
        $HaveVideo->description_short = $request->description_short;
        $HaveVideo->description = $request->description;
        $HaveVideo->lat = $request->lat;
        $HaveVideo->lng = $request->lng;
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
     **/
    public function destroy(HaveVideo $HaveVideo)
    {
        $HaveVideo->categories()->detach();
        $HaveVideo->delete();

        return redirect()->route('admin.have-video.index');
    }
}
