<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

use Illuminate\Support\Facades\Auth;

Route::get('/', 'PagesController@index')->middleware('guest');
Route::get('category/{id}', 'PagesController@category');
Route::get('article/{title}', 'PostsController@show')->name('article');
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('home', 'PagesController@index')->name('home');
    Route::post('article/{title}', 'PostsController@comment');
    Route::get('newpost',  'PostsController@create')->name('create_post');
    Route::post('newpost', 'PostsController@store');
    Route::get('editpost/{title}', 'PostsController@edit')->name('edit_post');
    Route::put('editpost/{id}', 'PostsController@update')->name('editpost');
    Route::delete('deletepost/{id}', 'PostsController@destroy')->name('deletepost');
    Route::get('profile', 'UserController@show')->name('profile');
    Route::put('profile', 'UserController@update');
    Route::get('archive', 'UserController@archive')->name('archive');
    Route::get('logout', function () {
        Auth::logout();
        return redirect('/');
    });
});
