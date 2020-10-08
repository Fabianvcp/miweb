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
        $posts = Post::latest('published_at')->get();
        return view('page.blog', compact('posts'));
    }
}
