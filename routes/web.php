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


Auth::routes(['verify' => true]);
Route::get('/', 'PagesController@index');
Route::get('category/{id}', 'PagesController@category');
Route::get('article/{title}', 'PostsController@show')->name('article');
Route::get('forum', 'ForumController@index');
Route::get('forum/{forum:name}', 'ForumController@show')->name("forum_name");
Route::get('forum/{forum:name}/{post:topic_id}', 'ForumController@messages')->name("forum_post");
// Route::get('send-mail', function () {
//     return (new \App\Mail\MailtrapExample(['name' => "test"]))->render();
// });

Route::get('verifyaccount', 'UserController@verifyAccount');

Route::group(['middleware' => ['auth']], function () {
    Route::get('newpost',  'PostsController@create');
    Route::post('newpost', 'PostsController@store');
    Route::get('editpost/{title}', 'PostsController@edit')->name('edit_post');
    Route::put('updatepost/{post}', 'PostsController@update')->name('updatepost');
    Route::delete('deletepost/{post}', 'PostsController@destroy')->name('deletepost');
    Route::post('article/{post}', 'PostsController@comment');
    Route::get('profile', 'UserController@show');
    Route::put('profile', 'UserController@update');
    Route::get('archive', 'UserController@archive');

    ################## Admin  ######################

    Route::group(['middleware' => ['is_admin']], function () {
        Route::get('admin', 'AdminController@index');
        Route::post('admin/category', 'AdminController@addCategory')->name('add_category');
        Route::delete('admin/category', 'AdminController@deleteCategory')->name('delete_category');

        Route::get('admin/userprofile/{user}', 'AdminController@userProfile')->name('userprofile');
        Route::post('admin/userprofile/{user}', 'AdminController@userAccount')->name('action');
    });

    Route::get('preview/article/{post}', 'PreviewPost@show')->name('preview');
    Route::post('preview/article/{post}', 'PreviewPost@action');

    Route::get('logout', 'UserController@logout');
});
