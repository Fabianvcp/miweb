<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio(){
        return view('welcome');
    }
    public function blog()
    {
        $posts = Post::published()->paginate();
        return view('page.blog', compact('posts'));

    }

    public function  portfolio(){

        $portfolios = Portfolio::published()->get();

        return view('page.perfil', compact('portfolios'));
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
        return redirect('/login');
    }
}
