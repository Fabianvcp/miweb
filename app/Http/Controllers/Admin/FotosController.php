<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use App\Foto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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


        toastr()->success('Ha sido guardado correctamente', 'Las imagenes se han almacenado', ['timeOut' => 5000]);


        Foto::create([
            'url'=>Storage::url($fotos),
            'portfolio_id' => $portfolio->id
        ]);
    }
}
