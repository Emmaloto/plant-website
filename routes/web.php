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

Route::get('/groups', function () {
    $title = "Page Temporarily Unavailable";
});
*/

Route::get('/', "PagesController@index");

Route::get('/about', "PagesController@about");

//Route::get('/unavailable', "PagesController@unavailable");

Route::get('/unavailable', function () {
    $title = "Page Temporarily Unavailable";
    return view('pages.unfinished')->with('title', $title);
});

Route::get('/groups', "PlantListController@categories");

Route::get('/category/{categoryName}', ['uses' =>'PlantListController@loadPlantList', 'as'=>'GroupRoute']);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::get('/posts',  ['uses' =>'PostsController@index']);

Auth::routes();


