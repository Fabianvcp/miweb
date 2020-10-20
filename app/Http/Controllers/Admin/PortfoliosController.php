<?php

namespace App\Http\Controllers\Admin;

use App\Category_p;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PortfoliosController extends Controller
{
    public function index(){

        $portfolios= Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',

        ]);

        $portfolio = Portfolio::create($request->only('title'));

        return redirect()->route('admin.portfolio.edit', $portfolio);
    }

    public function edit(Portfolio $portfolio){

        $categorie_ps= Category_p::all();
        return view('admin.portfolio.edit', compact('categorie_ps','portfolio'));

    }

    public function update(Portfolio $portfolio , StorePortfolioRequest  $request)
    {

        //almacenar datos en databases
        //return Post::create($request->all());

        //si no tienen imagen de image la guardamos
        if( $portfolio->image === null) {
            $image = $request->file('portada');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/galeria');
            $img = Image::make($image->path());
            $img->resize(750, 350)->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = public_path('/portfolio');
            $image->move($destinationPath, $input['imagename']);
            $portfolio->portada = $input['imagename'];
            //como es obligatorio si no tiene via js en la vista no hay que poner un required, pero si ya tiene una foto
            //hay que verificar, si  no envia nada, se mantiene la misma y imagen
        }else{
            //ahora si es distinta hay que borrar la anterior y cambiarla por la nueva
            $portadas = $request->get('image');
            $largo = strlen($portadas);

            if($largo > 0){
                $image = $request->file('portada');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/galeria');
                $img = Image::make($image->path());
                $img->resize(750, 350)->save($destinationPath . '/' . $input['imagename']);

                $destinationPath = public_path('/portfolio');
                $image->move($destinationPath, $input['imagename']);
                $portfolio->portada = $input['imagename'];

            }else{
                return  $largo;
            }
        }
        $portfolio->title = $request->get('title');
        $portfolio->body = $request->get('body');
        $portfolio->link = $request->get('link');
        $portfolio->published_at = $request->get('published_at');
        $portfolio->category_p_id = $request->get('category_p_id');
        //save
        $portfolio->save();
        toastr()->success('Se almacenado correctamente', $request->get('title'), ['timeOut' => 5000]);
        //return redirect()->route('admin.posts.edit', $portfolio);
        return redirect()->route('admin.portfolio.edit', $portfolio);
    }
}
