<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\VideoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/master', [MasterController::class, 'index']);
Route::post('/add-collection',  [MasterController::class, 'create_master']);
Route::post('/edit-collection/{id}',  [MasterController::class, 'update_master']);
Route::delete('/delete-collection/{id}',  [MasterController::class, 'destroy_master']);

Route::post('/add-vidio',  [VideoController::class, 'create_vidio']);
Route::post('/upload-vidio/{id}',  [VideoController::class, 'upload_vidio']);
Route::post('/simple-upload-vidio',  [VideoController::class, 'simple_upload_vidio']);

Route::get('/list-series',  [VideoController::class, 'show_list_series']);
Route::post('/edit-vidio/{id}',  [VideoController::class, 'update_information_vidio']);
Route::delete('/delete-vidio/{id}',  [VideoController::class, 'destroy_vidio']);
Route::get('/show-vidio/{id}',  [VideoController::class, 'show_vidio']);
Route::post('/create-thumbnail-vidio/{id}',  [VideoController::class, 'create_thumbnail']);
Route::post('/create-caption-vidio/{id}',  [VideoController::class, 'create_caption']);








