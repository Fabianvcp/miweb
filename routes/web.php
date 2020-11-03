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
Route::get('quienes-somos', 'PagesController@about')->name('about');
Route::get('servicios', 'PagesController@service')->name('service');
Route::get('contacto', 'PagesController@contact')->name('contact');

//routes por dentro del panel



Route::group(['prefix'=>'admin','namespace' => 'admin',  'middleware' => 'auth' ], function (){

    Route::get('home', 'HomeController@index')->name('home');
    //post
    Route::resource('posts','PostsController', ['except' => 'show', 'as' =>  'admin']);
    //user
    Route::resource('users','UsersController', ['as' =>  'admin']);

    Route::resource('roles','RolesController', ['except' => 'show', 'as' =>  'admin']);
    //rol
    Route::put('users/{user}/roles', 'UsersRolesController@update' )->name('admin.users.roles.update');
    //permisos
    Route::put('users/{user}/permisos', 'UsersPermissionsController@update')->name('admin.users.permissions.update');

    //photo
    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
});

Auth::routes(['register' => false]);
