<?php

namespace App\Models;

use Carbon\Carbon;
use Conner\Tagging\Taggable;
use File;
use Google_Service_Drive_Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SearchVideo extends Model
{
    use Taggable;

    protected $guarded = [];

    public function videoSave($SearchVideo, $request)
    {

        $SearchVideo->title = $request->title;
        if ($request->published) $SearchVideo->published = $request->published;
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
        return $SearchVideo;
    }

    public function videoShare($filename)
    {

        $fullPathToVideo = $filename->store('uploads/HaveVideo/upload', 'public');

        $url = Storage::url($fullPathToVideo, 'public');
        $url = Storage::path($fullPathToVideo, 'public');
        $url = str_replace("/", "\\", $url);                    ///WINDOWS windows
        $url = str_replace("app\\", "app\public\\", $url);
        $fileData = File::get($filename);
        $name = $filename->hashName();


        // Get the file to find the ID
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));

        $dir = $contents->where('type', '=', 'dir')
            ->where('filename', '=', Auth::user()->id)
            ->first(); // There could be duplicate directory names!
        if (!$dir) {
            Storage::cloud()->makeDirectory(Auth::user()->id);
            $dir = $contents->where('type', '=', 'dir')
                ->where('filename', '=', Auth::user()->id)
                ->first(); // There could be duplicate directory names!
        }


        $save = Storage::cloud()->put($dir['path'] . '/' . $name, $fileData);


        //  $recursive = false; // Get subdirectories also?
        //$contents=false;
        //$contents = collect(Storage::cloud()->listContents($dir['path'], $recursive));
        $file = collect(Storage::cloud()->listContents($dir['path'], false))
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($name, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($name, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!

        // Change permissions
        // - https://developers.google.com/drive/v3/web/about-permissions
        // - https://developers.google.com/drive/v3/reference/permissions
        $service = Storage::cloud()->getAdapter()->getService();
        $Permission = new Google_Service_Drive_Permission(array(
            'type' => 'anyone',
            'role' => "reader",
            'additionalRoles' => [],
            'withLink' => true,
            'value' => 'Romans INC'
        ));
        $hh = $service->permissions->create(
            $file['basename'], $Permission, array('fields' => 'id', 'supportsTeamDrives' => true));
        //return "https://drive.google.com/uc?id=".$file['path']."&export=download";
        $del = Storage::disk('public')->delete('uploads/HaveVideo/upload/' . $name);
        return $file['basename'];

    }


    public static function videoStore($request)
    {
        $SearchVideo = new SearchVideo();
        $SearchVideo->slug = Str::slug(mb_substr($request->title, 0, 40) . "-" . Carbon::now()->format('dmyHi'), '-');
        $SearchVideo->user = Auth::user()->id;
        $SearchVideo->videoSave($SearchVideo, $request);
        // Now add tags
        $SearchVideo->tag(explode(',', $request->tags));
        $media_photo = $request->file('media_photo');
        if ($media_photo) {
            foreach ($request->file('media_photo') as $file) {
                $data = "/" . $file->store('uploads/HaveVideo', 'public');
                $insert_media = DB::table('media_libs')->insert(
                    ['have_videos_id' => $SearchVideo->id, 'link' => $data, 'kind' => 2, 'media' => 2]
                );
            }
        }

        if ($request->media_video != '') {
            foreach ($request->media_video as $link) {
                if ($link) {
                    $insert_media = MediaLib::updateOrCreate(
                        ['have_videos_id' => $SearchVideo->id, 'link' => $link, 'kind' => 3, 'media' => 2]
                    );
                }
            }
        }
    }

    public static function videoUpdate($request, $id)
    {
        $SearchVideo = SearchVideo::find($id);

        if ($request->photo != '') { //перевірка існуючих файлів
            $saveds = MediaLib::where('have_videos_id', $id)->where('kind', 2)->where('media', 2)->get()->toArray();
            foreach ($saveds as $saved) {
                $yes = false;
                foreach ($request->photo as $link) {
                    if ($link) {
                        if ($link == $saved['link']) {
                            $yes = true;
                        }
                    }
                }
                if ($yes == false) {
                    Storage::disk('public')->delete($saved['link']);
                    Storage::cloud()->delete($saved['link']);
                    $id = $saved['id'];
                    MediaLib::where('id', $id)->delete();
                }
            }
        } else {
            MediaLib::where('have_videos_id', $id)->where('media', 1)->delete();
            Storage::cloud()->delete('1_FHPneW9tl8fzTHkRSPleanzt9IcU0f2');
            $insert_media = MediaLib::updateOrCreate(
                ['have_videos_id' => $SearchVideo->id, 'link' => '1jzh_TUhnEuw_iGURc8xMwYX0qGBdXFX8', 'kind' => 2, 'media' => 2]
            );

        }

        $media_photo = $request->file('media_photo'); //при завантажені файлів
        if ($media_photo) {
            foreach ($request->file('media_photo') as $file) {
                $link = $SearchVideo->videoShare($file);

                $insert_media = MediaLib::updateOrCreate(
                    ['have_videos_id' => $SearchVideo->id, 'link' => $link, 'kind' => '2', 'media' => 2]
                );

            }
        }


        if ($request->media_video != '') {
            foreach ($request->media_video as $link) {
                if ($link) {
                    $insert_media = MediaLib::updateOrCreate(
                        ['have_videos_id' => $SearchVideo->id, 'link' => $link, 'kind' => 3, 'media' => 2]
                    );
                }
            }
        }

        $video_file = $request->file('video_file');
        if ($video_file) {
            $video = $SearchVideo->videoShare($video_file);
            $insert_media = MediaLib::updateOrCreate(
                ['have_videos_id' => $SearchVideo->id, 'link' => $video, 'kind' => 3, 'media' => 2]
            );
        }


        // Now add tags
        $SearchVideo->tag(explode(',', $request->tags));
        $SearchVideo->videoSave($SearchVideo, $request);
    }

}
