<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Psy\Util\Str;

class PostsController extends Controller
{

    public function index() {

        $posts= Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        $categories= Category::all();
        $tags= Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }


    public function store(Request $request)
    {
        //validación
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required|min:10',
            'published_at' => 'required',
            'excerpt' => 'required|min:10',
            'category' => 'required',
            'tags[]' => 'required'
        ]);

            toastr()->error('An error has occurred please try again later.');

        //almacenar datos en databases
        //return Post::create($request->all());

        $post = new Post;
        $post->title = $request->get('title');
        $post->url = Str::slug($request->get('title'));
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id = $request->get('category');
        //save

        $post->save();
        //etiquetas
        $post->tags()->attach($request->get('tags'));

        toastr()->success('Ha sido creada correctamente', $request->get('title'), ['timeOut' => 5000]);
        return back();

    }


}
