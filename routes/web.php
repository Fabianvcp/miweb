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
Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tag/{tag}', 'TagsController@show')->name('tags.show');
Route::get('portfolios', 'PagesController@portfolio')->name('portfolio');
Route::get('portfolios/{portfolio}', 'PortfolioController@show')->name('portfolio.show');

//routes por dentro del panel



Route::group(['prefix'=>'admin','namespace' => 'admin',  'middleware' => 'auth' ], function (){

    Route::get('home', 'HomeController@index')->name('home');
    //post
    Route::get('posts', 'PostsController@index')->name('admin.posts.index');
    Route::post('posts', 'PostsController@store')->name('admin.posts.store');
    Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
    Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');

    //portfolio
    Route::get('portfolio', 'PortfoliosController@index')->name('admin.portfolio.index');
    Route::post('portfolio', 'PortfoliosController@store')->name('admin.portfolio.store');
    Route::get('portfolio/{portfolio}', 'PortfoliosController@edit')->name('admin.portfolio.edit');
    Route::put('portfolio/{portfolio}', 'PortfoliosController@update')->name('admin.portfolio.update');
    //fotos
    Route::post('portfolio/{portfolio}/fotos', 'FotosController@store')->name('admin.portfolio.fotos.store');
    Route::delete('fotos/{foto}', 'FotosController@destroy')->name('admin.fotos.destroy');

    //photo
    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
});

Auth::routes(['register' => false]);
