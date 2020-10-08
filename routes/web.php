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

//routes por dentro del panel

Auth::routes(['register' => false]);


Route::group([
    'prefix'=>'admin',
    'namespace' => 'admin',
    'middleware' => 'auth'
     ], function (){
    Route::get('home', 'HomeController@index')->name('home');

    Route::get('post', 'PostsController@index')->name('admin.posts.index');
    Route::get('post/create', 'PostsController@create')->name('admin.posts.create');

});
