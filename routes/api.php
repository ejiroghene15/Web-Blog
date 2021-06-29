<?php

use Illuminate\Http\Request;

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

Route::post('upload', function (Request $request) {
    $img_name = pathinfo($request->file('upload')->getClientOriginalName())['filename'];
    $img_path = Cloudinary\Uploader::upload($request->file('upload'), [
        "folder" => "articles",
        "public_id" => $img_name,
    ])['secure_url'];

    return response()->json([
        'uploaded' => true,
        "url" => $img_path,
    ]);
});

Route::post('react_on_post', 'PostsController@react');
