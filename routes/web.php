<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', [
    'as'=>'front.home',
    'uses'=>'HomeController@index'
]);
Route::get('/post/{id}', [
    'as'=>'home.post',
    'uses'=>'HomeController@post'
]);
Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');


Route::group(['middleware'=>'admin','as'=>'admin.'], function(){
    Route::get('/admin',[
        'as'=>'index',
        'uses'=>'AdminController@index'
    ]);
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/posts', 'AdminPostsController');
    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::get('/admin/media/upload',[
        'as'=>'media.upload',
        'uses'=>'AdminMediasController@upload'
    ]);
    Route::delete('/admin/delete/media',[
        'as'=>'media.delete',
        'uses'=>'AdminMediasController@deleteMedia'
    ]);
    Route::resource('/admin/media', 'AdminMediasController');

    Route::resource('/admin/comments', 'PostCommentsController');

    Route::resource('/admin/comment/replies', 'CommentRepliesController');
});

Route::group(['middleware'=>'auth'], function() {

    Route::post('comment/reply', 'CommentRepliesController@createReply');
});
