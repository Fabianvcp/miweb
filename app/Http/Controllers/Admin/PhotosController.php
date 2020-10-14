<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Psy\Util\Str;

class PhotosController extends Controller
{
    /**
     * @param Post $post
     * @return string
     * @throws ValidationException
     */
    public function store(Post $post)
    {
        $this->validate( request(),[
            'photo' => 'image|max:5300'//
        ]);

        $photo = request()->file('photo');
        $photoURl =  $photo->store('post');

        toastr()->success('Ha sido guardado correctamente', 'Las imagenes se han almacenado', ['timeOut' => 5000]);

    }
}
