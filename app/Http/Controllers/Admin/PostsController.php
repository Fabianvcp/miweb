<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use  Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::allowed()->get();
        return view('admin.posts.index', compact('posts'));
    }

//    public function create(){
//        $categories= Category::all();
//        $tags= Tag::all();
//        return view('admin.posts.create', compact('categories','tags'));
//    }


    public function store(Request $request)
    {
        $this->authorize('create', new Post);
        $this->validate($request, [
            'title' => 'required|min:3'
        ]);
        //$post = Post::create($request->only('title'));
        $post = Post::create([$request->all()]);
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit',[
            'categories' =>Category::all(),
            'tags' => Tag::all(),
            'post' => $post
        ]);

    }

    public function update(Post $post , StorePostRequest $request)
    {

        $this->authorize('update', $post);

        //almacenar datos en databases
        //return Post::create($request->all());

        //si no tienen imagen de portada la guardamos
        if( $post->portada === null) {
            $image = $request->file('portada');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->path());
            $img->resize(750, 350)->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = public_path('/portadas');
            $image->move($destinationPath, $input['imagename']);
            $post->portada = $input['imagename'];
            //como es obligatorio si no tiene via js en la vista no hay que poner un required, pero si ya tiene una foto
            //hay que verificar, si  no envia nada, se mantiene la misma y imagen
        }else{
            //ahora si es distinta hay que borrar la anterior y cambiarla por la nueva
             $portadas = $request->get('portada');
                $largo = strlen($portadas);

            if($largo > 0 && $post->portada == $portadas){

                $image = $request->file('portada');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/thumbnail');
                $img = Image::make($image->path());
                $img->resize(750, 350)->save($destinationPath . '/' . $input['imagename']);

                $destinationPath = public_path('/portadas');
                $image->move($destinationPath, $input['imagename']);
                $post->portada = $input['imagename'];

            }else{
              $post->portada;
            }
        }
        $post->title = $request->get('title');
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        $post->published_at = $request->get('published_at');
        $post->category_id =$request->get('category_id');
        //save
        $post->save();

        //etiquetas
        $post->tags()->sync($request->get('tags'));
        toastr()->success($request->get('excerpt'), $request->get('title'), ['timeOut' => 5000]);
      return redirect()->route('admin.posts.edit', $post);
    }
    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        toastr()->success('La publicación ha sido eliminada','Eliminación', ['timeOut' => 5000]);
        return redirect()->route('admin.posts.index');

    }
}
