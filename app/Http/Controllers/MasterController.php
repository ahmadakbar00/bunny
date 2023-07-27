<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Http\Controllers\UploadBunny;


class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Master::all();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_master(Request $request)
    {

        /**
         * UploaBunnyController
         * ? Modul Integration to Bunny Storage
         * 
         * * Response will be:
         * {"videoLibraryId":141387,"guid":"b963b83e-540d-4534-8eec-3d6d93bd7230","name":"Test Nama 2","videoCount":0,"totalSize":0,"previewVideoIds":null}
         * 
         */
     
        $otherController = app(UploadBunny::class);
        $response = $otherController->createCollectionBunny($request->title);
        $responseArray = json_decode($response, true);
        
         if($response != null){

            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string',
                'publish_status' => 'nullable|string',
                'last_activity_date' => 'nullable|string',
                'image' => 'nullable|string',
                'sinopsis' => 'nullable|string',
                'tag' => 'nullable|string',
                'genre' => 'nullable|string',
                'airing_status' => 'nullable|string',
                'rating' => 'nullable|string',
                'total_views' => 'nullable|string',
                'total_streams' => 'nullable|string',
                'created_by' => 'nullable|string',
                'active' => 'nullable|boolean',
                'id_collection' => 'nullable|string',
                'guid_collection' => 'nullable|string',
                'videoCount_collection' => 'nullable|string',
                'size_collection' => 'nullable|string'
            ]);

            $master_collection = new Master;
            $master_collection->title = $request->title;
            $master_collection->publish_status = $request->publish_status;
            $master_collection->last_activity_date = $request->last_activity_date;
            $master_collection->image = $request->image;
            $master_collection->sinopsis = $request->sinopsis;
            $master_collection->tag = $request->tag;
            $master_collection->genre = $request->genre;
            $master_collection->airing_status = $request->airing_status;
            $master_collection->rating = $request->rating;
            $master_collection->total_views = $request->total_views;
            $master_collection->total_streams = $request->total_streams;
            $master_collection->created_by = $request->created_by;
            $master_collection->active = $request->active;
            $master_collection->id_collection = $request->id_collection;
            $master_collection->guid_collection = $request->guid_collection;
            $master_collection->videoCount_collection = $request->videoCount_collection;
            $master_collection->size_collection = $request->size_collection;

            $master_collection->id_collection = $responseArray['videoLibraryId'];
            $master_collection->guid_collection = $responseArray['guid'];
            $master_collection->videoCount_collection = $responseArray['videoCount'];
            $master_collection->size_collection = $responseArray['totalSize'];

            $master_collection->save();

            return response()->json($master_collection, 201);
        }
     return response()->json('Error', 500);;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function update_master(Request $request, $id)
    {

    //  Http::attach('file', file_get_contents($tempfile), 'myfile.pdf')->withHeaders([
    // 'Content-Type' => 'application/pdf',
    // ])->post('example.org')->json();

        $master_collection = Master::where('guid_collection', $id)->first();
        $otherController = app(UploadBunny::class);
        $response = $otherController->updateCollectionBunny($request, $id);

        if($response != null){
            $master_collection->title = $request->title;
            $master_collection->save();
            return response()->json($master_collection, 201);
        }else{
            return response()->json('Error', 500);;
        }

    }

    /**
     * Display the specified resource.
     */
    public function destroy_master(string $id)
    {
        $master_collection = Master::where('guid_collection', $id)->first();
        $otherController = app(UploadBunny::class);
        $response = $otherController->destroyCollectionBunny($id);

        if($response == true){
            $master_collection->delete();
            return response()->json($master_collection, 201);
        }else{
            return response()->json('Error', 500);;
        }
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
