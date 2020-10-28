<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        //si esta publicado o tenes el permiso podras acceder
    if ($post->isPublished() || auth()->check()){
        return view('posts.show', compact('post'));
    }
        abort(404);
    }
}
