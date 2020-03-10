<?php

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('upload', function () {
    Storage::putFileAs('public/post_images', new File($_FILES['upload']['tmp_name']), $_FILES['upload']['name']);
    return response()->json([
        'uploaded' => true,
        "url" => asset(Storage::url('post_images/' . $_FILES['upload']['name']))
    ]);
});

Route::post('react_on_post',  'PostsController@react');
