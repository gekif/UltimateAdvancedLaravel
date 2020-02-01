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

use App\Post;

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/nothing', function () {
//    return view('welcome');
//});


Route::get('/about', function () {
//    return "About Me";

    return view('about');

});


//Route::get('/post/{id}', function ($id) {
//    $post = Post::find($id);
//
//    return view('post')->withPost($post);
//});


Route::get('/post/{id}', 'PostsController@index');

Route::get('/posts', 'PostsController@showAllPosts');

Route::post('/store-post', 'PostsController@storePost');

Route::get('/create-post', 'PostsController@createPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
