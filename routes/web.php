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

use App\Category;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'BlogController@index');

Route::get('/article/{article}', 'BlogController@show')->name('article.show');

Route::get('/category/{category}', 'BlogController@category')->name('category');

Route::get('/tag/{tag}', 'BlogController@tag')->name('tag');

Route::get('/user/{user}', 'BlogController@user')->name('user');

Route::get('main', function (){
   $articles =  \App\Article::find(1);

   dd(\Illuminate\Support\Facades\Storage::disk('backpack')->get($articles->user->image->imageable_url));
//   dd(($articles->image));
});

