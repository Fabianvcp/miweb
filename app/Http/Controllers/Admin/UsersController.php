<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        $roles = Role::where('name', '!=', 'super-admin')->with('permissions')->get();
        //if( ){
            $permissions = Permission::where('name', '!=', 'Create role')->pluck('name','id');
//        }else {
//            $permissions = Permission::where('name', '!=', 'Create role')->pluck('name', 'id');
//        }
        return view('admin.users.edit', compact('user','roles','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return Request
     */
    public function update(UpdateUserRequest $request, User $user)
    {
          if( $user->photo === null) {
            $image = $request->file('photo');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/perfil');
            $img = Image::make($image->path());
            $img->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = public_path('/team');
            $image->move($destinationPath, $input['imagename']);
            $user->photo = $input['imagename'];
            //como es obligatorio si no tiene via js en la vista no hay que poner un required, pero si ya tiene una foto
            //hay que verificar, si  no envia nada, se mantiene la misma y imagen
        }else{
            //ahora si es distinta hay que borrar la anterior y cambiarla por la nueva
            $portadas = $request->get('photo');
            $largo = strlen($portadas);

            if($largo > 0 && $user->photo == $portadas){

                $image = $request->file('photo');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/perfil');
                $img = Image::make($image->path());
                $img->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);

                $destinationPath = public_path('/team');
                $image->move($destinationPath, $input['imagename']);
                $user->photo = $input['imagename'];

            }else{
                $user->photo;
            }
        }
        if($request->filled('password'))
        {
            $user->password = $request->get('password');
        }


        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->personal_phrase = $request->get('personal_phrase');
        $user->update();
        $message="La base de datos se ha actualizado";
        // Set a success toast, with a title
        toastr($message, 'info');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
