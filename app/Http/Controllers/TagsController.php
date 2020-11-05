<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class TagsController extends Controller
{
   public  function show(Tag $tag)
   {
        return view('page.blog', [
            'title' => "Publicaciones relacionada con la etiqueta '{$tag->name}'",
            'authors' => User::take(4)->get(),
            'categories' => Category::take(7)->get(),
            'publicaciones' => Post::latest('published_at')->take(5)->get(),
            'tags' => Tag::all(),
            'posts' => $tag->posts()->paginate()
        ]);
   }
}
