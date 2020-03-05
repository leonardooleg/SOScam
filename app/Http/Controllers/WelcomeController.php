<?php

namespace App\Http\Controllers;

use App\Models\HaveVideo;
use App\Models\SearchVideo;
use DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $HaveVideos = HaveVideo::latest()->limit(6)->get();
        $SearchVideos = SearchVideo::latest()->limit(3)->get();
        return view('welcome')->with(['HaveVideos' => $HaveVideos, 'SearchVideos' => $SearchVideos]);
    }

    public function search(Request $request)
    {

        $address = urlencode($request->address);
        if (!$address) $address = urlencode("Київ Україна");
        if (!$request->radius) $request->radius = 10;


        // google map geocode api url
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU";

        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);

        // response status will be 'OK', if able to geocode given address
        if ($resp['status'] == 'OK') {

            // get the important data
            $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
            $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
            $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";

            // verify if data is complete
            if ($lati && $longi && $formatted_address) {

                // put the data in the array
                $data_arr = array();
                array_push(
                    $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
                );
                /* return $data_arr;*/
            } else {
                /*return false;*/
            }
        } else {
            $data_arr = [0, 0, "не знайдено"];
        }


        // Объекты рядом
        $area = (1 / 97) * $request->radius;

        $lat[0] = $data_arr[0] - $area;
        $lat[1] = $data_arr[0] + $area;
        $lng[0] = $data_arr[1] - $area;
        $lng[1] = $data_arr[1] + $area;
        $Videos = HaveVideo::whereBetween('lat', array($lat[0], $lat[1]))->whereBetween('lng', array($lng[0], $lng[1]))->paginate(15);

        $radius = $request->radius;
        return view('search')->with(['videos' => $Videos, 'address' => $data_arr[2], 'lat' => $data_arr[0], 'lng' => $data_arr[1], 'radius' => $radius]);

    }

}
