<?php

namespace App\Http\Controllers\Admin;

use App\Category_p;
use App\Http\Controllers\Controller;
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
            'title' => 'required'
        ]);

        $portfolio = Portfolio::create([
            'title' => $request->get('title'),
            'url' => Str::slug($request->get('title')),
        ]);

        return redirect()->route('admin.portfolio.edit', $portfolio);
    }

    public function edit(Portfolio $portfolio){

        $categorie_ps= Category_p::all();
        return view('admin.portfolio.edit', compact('categorie_ps','portfolio'));

    }

    public function update(Portfolio $portfolio , Request $request)
    {
        //validacion
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5300',
            'title' => 'required',
            'body' => 'required|min:10',
            'published_at' => 'required',
            'category_p_id' => 'required',
        ]);
        //almacenar datos en databases
        //return Post::create($request->all());

        //almacenar datos en databases
        //return Post::create($request->all());
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('/galeria');
        $img = Image::make($image->path());
        $img->resize(750, 350)->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/portfolio');
        $image->move($destinationPath, $input['imagename']);

        $portfolio->image =$input['imagename'];
        $portfolio->title = $request->get('title');
        $portfolio->url = Str::slug($request->get('title'));
        $portfolio->image =$input['imagename'];
        $portfolio->body = $request->get('body');
        $portfolio->link = $request->get('link');
        $portfolio->published_at = Carbon::parse($request->get('published_at'));
        $portfolio->category_p_id = $request->get('category_p_id');
        //save
        $portfolio->save();
        toastr()->success('Se almacenado correctamente', $request->get('title'), ['timeOut' => 5000]);
        //return redirect()->route('admin.posts.edit', $portfolio);
        return redirect()->route('admin.portfolio.edit', $portfolio);
    }
}
