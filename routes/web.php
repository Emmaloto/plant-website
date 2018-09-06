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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', "PagesController@index");

Route::get('/about', "PagesController@about");

Route::get('/unavailable', "PagesController@c");

//Route::get('/create', "PagesController@create");

// Route::get('/plantDisplay', "PagesController@show");

Route::resource('posts', 'PostsController');
//Route::get('/plantDisplay', "PostsController@store");

//Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
