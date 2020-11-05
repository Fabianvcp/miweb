<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        //si esta publicado o tenes el permiso podras acceder
    if ($post->isPublished() || auth()->check()){
        $authors = User::take(4)->get();
        $categories = Category::take(7)->get();
        $publicaciones = Post::latest('published_at')->take(5)->get();
        $tags = Tag::all();
        return view('posts.show', compact('post','authors','categories','publicaciones','tags'));
    }
        abort(404);
    }
}
