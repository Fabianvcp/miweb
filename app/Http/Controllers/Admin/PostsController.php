<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use  Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function index() {

        $posts= Post::all();
        return view('admin.posts.index', compact('posts'));
    }

//    public function create(){
//        $categories= Category::all();
//        $tags= Tag::all();
//        return view('admin.posts.create', compact('categories','tags'));
//    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->get('title'),
            'url' => Str::slug($request->get('title')),
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }
    public function edit(Post $post)
    {

        $categories= Category::all();
        $tags= Tag::all();
        return view('admin.posts.edit', compact('categories','tags','post'));
    }

    public function update(Post $post , Request $request)
    {
        if ($request->file('portada') === null){
            return $post->portada;
        }
        else
        {
            return "no funciono";
        }
        //validación
       $this->validate($request, [
           'portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg||max:5300',
            'title' => 'required',
            'body' => 'required|min:10',
            'published_at' => 'required',
            'excerpt' => 'required|min:10',
            'category_id' => 'required',
            'tags' => 'required'
        ]);
        //almacenar datos en databases
        //return Post::create($request->all());
        $image = $request->file('portada');
        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->path());
        $img->resize(750, 350)->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/portadas');
        $image->move($destinationPath, $input['imagename']);
        $post->portada =$input['imagename'];
        $post->title = $request->get('title');
        $post->url = Str::slug($request->get('title'));
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id = $request->get('category_id');
        //save
        $post->save();
        //etiquetas
        $post->tags()->sync($request->get('tags'));
        toastr()->success($request->get('excerpt'), $request->get('title'), ['timeOut' => 5000]);
      return redirect()->route('admin.posts.edit', $post);
    }
}
