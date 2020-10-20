<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5300'//
        ]);
        $photo = request()->file('photo')->store('public');
        Photo::create([
            'url'=>Storage::url($photo),
            'post_id' => $post->id
        ]);
        toastr()->success('Ha sido guardado correctamente', 'Las imagenes se han almacenado', ['timeOut' => 5000]);
    }


    public function destroy(Photo $photo)
    {
        $photo->delete();
        $photoPath = Str::replaceArray('Storage', ['public'], $photo->url) ;
        Storage::delete($photoPath);
        toastr()->success('Ha sido borrado correctamente', 'Las imagenes eliminado', ['timeOut' => 5000]);

        return back();
    }

}
