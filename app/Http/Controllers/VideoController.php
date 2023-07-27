<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Video;
use App\Http\Controllers\UploadBunny;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Function Upload Vidio Bunny
     * 
     */
    public function create_vidio(Request $request)
    {
        $video = new Video;
       
        $otherController = app(UploadBunny::class);
        $response = $otherController->createVidioBunny($request);
        $responseArray = json_decode($response, true);

        if($response != null){
            $video->title = $request->title;
            $video->id_collection = '141387';
            $video->id_vidio = $responseArray['guid'];
            $video->publish_status = $request->publish_status;
            $video->last_activity_date = $request->last_activity_date;
            $video->image = $request->image;
            $video->rating = $request->rating;
            $video->total_views = $request->total_views;
            $video->size = $request->size;
            $video->created_by = $request->created_by;
            $video->active = false;

            $video->save();
            return response()->json($video, 201);
        }else{
            return response()->json('Error', 500);;
        }
    }

    /**
     * Function Upload Vidio Bunny
     * 
     */
    public function upload_vidio($id, Request $request)
    {
        $video = new Video;

        $videoData = file_get_contents($request->file('video')->getRealPath());
      
        $master_collection = Video::where('id_vidio', $id)->first();

        $otherController = app(UploadBunny::class);
        $responseVideo = $otherController->uploadVidioBunny($id, $request);
        $responseVideoArray = json_decode($responseVideo, true);
   
        if($responseVideo != null){
            // $video->title = $request->title;
            // $video->id_collection = '141387';
            // $video->id_vidio = $responseVideoArray['guid'];
            // $video->publish_status = $request->publish_status;
            // $video->last_activity_date = TIme::now();
            // $video->image = $request->image;
            // $video->rating = $request->rating;
            // $video->total_views = $request->total_views;
            // $video->size = $request->size;
            // $video->created_by = $request->created_by;
            // $video->active = true;
            // $video->save();
            return response()->json($responseVideoArray, 201);
        }else{
            return response()->json('Error', 500);;
        }
    }


     /**
     * Create then upload to bunny 
     * ? This functoun directly running created and upload vidio
     */

    public function simple_upload_vidio(Request $request)
    {
        $video = new Video;

        $otherController = app(UploadBunny::class);
        $response = $otherController->createVidioBunny($request);
        $responseArray = json_decode($response, true);

        $responseVideo = $otherController->uploadVidioBunny($responseArray['guid'], $request);
        $responseVideoArray = json_decode($responseVideo, true);

        if($response != null){
            $video->title = $request->title;
            $video->id_collection = '141387';
            $video->id_vidio = $responseArray['guid'];
            $video->publish_status = $request->publish_status;
            $video->last_activity_date = $request->last_activity_date;
            $video->image = $request->image;
            $video->rating = $request->rating;
            $video->total_views = $request->total_views;
            $video->size = $request->size;
            $video->created_by = $request->created_by;
            $video->active = false;

            $video->save();
            return response()->json($video, 201);
        }else{
            return response()->json('Error', 500);;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_list_series()
    {
        $otherController = app(UploadBunny::class);
        $response = $otherController->listVidioBunny();
        $responseArray = json_decode($response, true);

        if($response!=null){
            return response()->json($response, 201);
        }else{
            return response()->json('Error', 500);;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update_information_vidio($id, Request $request)
    {
        $otherController = app(UploadBunny::class);
        $response = $otherController->updateInformationVidioBunny($id, $request);
        $responseArray = json_decode($response, true);

        if($response!=null){
            return response()->json('Success', 201);
        }else{
            return response()->json('Error', 500);;
        }
    }

     /**
     * Store a newly created resource in storage.
     */
    public function destroy_vidio($id)
    {
        $otherController = app(UploadBunny::class);
        $response = $otherController->deleteVidioBunny($id);
        $responseArray = json_decode($response, true);

        if($response!=null){
            return response()->json('Success', 201);
        }else{
            return response()->json('Error', 500);;
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show_vidio($id)
    {
        $otherController = app(UploadBunny::class);
        $response = $otherController->getVidioBunny($id);
        $responseArray = json_decode($response, true);

        if($response!=null){
            return response()->json($response, 201);
        }else{
            return response()->json('Error', 500);;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function create_thumbnail($id, Request $request)
    {
        $otherController = app(UploadBunny::class);
        $response = $otherController->createThumbnailBunny($id, $request->imgUrl);
        $responseArray = json_decode($response, true);

        // if($response!=null){
        //     return response()->json($response, 201);
        // }else{
        //     return response()->json('Error', 500);;
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function create_caption($id, Request $request )
    {
        $otherController = app(UploadBunny::class);
        $response = $otherController->createCaption($id, $request);
        $responseArray = json_decode($response, true);

        // if($response!=null){
        //     return response()->json($response, 201);
        // }else{
        //     return response()->json('Error', 500);;
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
