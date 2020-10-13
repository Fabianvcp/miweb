<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio() {
        return view('welcome');
    }
    public function blog(){
       //
        $posts = Post::published()->get();

        return view('page.blog', compact('posts'));
    }
}
