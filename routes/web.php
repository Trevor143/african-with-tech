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

use App\Article;
use App\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

Route::get('/', 'BlogController@index')->name('home');

Route::get('/article/{article}', 'BlogController@show')->name('article.show');

Route::get('/category/{category}', 'BlogController@category')->name('category');

Route::get('/tag/{tag}', 'BlogController@tag')->name('tag');

Route::get('/user/{user}', 'BlogController@user')->name('user');

Route::get('main', function ($limit =5){

});

