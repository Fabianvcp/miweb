<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//route  de la plantilla externas
Route::get('/', 'PagesController@inicio')->name('inicio');
Route::get('blog', 'PagesController@blog')->name('blog');
Route::get('blog/{post}', 'PostsController@show')->name('posts.show');

//routes por dentro del panel

Auth::routes(['register' => false]);


Route::group(['prefix'=>'admin','namespace' => 'admin',  'middleware' => 'auth' ], function (){

    Route::get('home', 'HomeController@index')->name('home');
    //post
    Route::get('posts', 'PostsController@index')->name('admin.posts.index');
    Route::post('posts', 'PostsController@store')->name('admin.posts.store');
    Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
    Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
    //photo
    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    //portfolio
    Route::get('portfolio', 'PortfoliosController@index')->name('admin.portfolio.index');
    //Route::get('post/create', 'PostsController@create')->name('admin.posts.create');

});
