<?php

namespace App\Http\Controllers;

use App\Category;
use App\Portfolio;
use App\Post;
use App\Tag;
use App\User;

class PagesController extends Controller
{
    public function inicio(){
        return view('welcome');
    }
    public function blog()
    {
            $posts = Post::published()->paginate();
            $authors = User::take(4)->get();
            $categories = Category::take(7)->get();
            $publicaciones = Post::latest('published_at')->take(5)->get();
            $tags = Tag::all();


        return view('page.blog', compact('posts','authors','categories','publicaciones','tags'));

    }

    public function  about(){
        return view('page.about');
    }
    public function  service(){
        return view('page.service');
    }

    public function  contact(){
        return view('page.contact');
    }


    public function  cierre(){

        header("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
        header("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
        header("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE

        return redirect('/login');
    }
}
