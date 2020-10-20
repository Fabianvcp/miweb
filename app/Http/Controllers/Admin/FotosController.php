<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use App\Foto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class FotosController extends Controller
{
    /**
     * @param Portfolio $portfolio
     * @throws ValidationException
     */
    public function store(Portfolio $portfolio){
        $this->validate( request(),[
            'foto' => 'image|max:5300'//
        ]);

        $fotos = request()->file('foto')->store('public');




        Foto::create([
            'url'=>Storage::url($fotos),
            'portfolio_id' => $portfolio->id
        ]);
        toastr()->success('Ha sido guardado correctamente', 'Las imagenes se han almacenado', ['timeOut' => 5000]);
    }
    public function destroy(Foto $foto)
    {
        $foto->delete();
        $photoPath = Str::replaceArray('Storage', ['public'], $foto->url) ;
        Storage::delete($photoPath);
        toastr()->success('Ha sido borrado correctamente', 'Las imagenes eliminado', ['timeOut' => 5000]);

        return back();
    }


}
