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
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'BlogController@index')->name('home');

Route::get('/article/{article}', 'BlogController@show')->name('article.show');

Route::get('/category/{category}', 'BlogController@category')->name('category');

Route::get('/tag/{tag}', 'BlogController@tag')->name('tag');

Route::get('/user/{user}', 'BlogController@user')->name('user');

Route::get('main', function (){
//    dd(Storage::disk('trial')->url(backpack_user()->image->imageable_url));
    $image = backpack_user()->image->imageable_url;
    return view('main', compact('image'));
//    dd(storage_path('app\public\trial'));

});

