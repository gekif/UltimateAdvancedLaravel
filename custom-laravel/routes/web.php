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

/*Route::get('/', function () {

//    return view('welcome');

//    $medium = resolve('medium-php-sdk');

//    dd($medium);

//    dd(session()->get('test'));

});*/

Route::middleware('test')->get('/', function () {
    return view('welcome');
});


//Route::get('/custom', function () {
//
//    dd(config('app.developers'));
//
//    dd(config('blog.administrators'));
//
//    dd(env('APP_CREATOR'));
//
//    dd(config('blog.creator'));
//
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
