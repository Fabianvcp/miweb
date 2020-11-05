<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserWasCreated;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
        $users = User::allowed()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {

        $this->authorize('create', new User);
        $user = new User;
        $roles = Role::where('name', '!=', 'super-admin')->with('permissions')->get();

        $permissions = Permission::where('name', '!=', 'Create roles')->get();


        return view('admin.users.create', compact('roles','permissions','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {

        $this->authorize('create', new User);
        // Validar el formulario
       $data = $request->validate([
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'phone' => 'min:10| max:15',
            'personal_phrase' => 'required'
        ]);
        // Generar una contraseña
        $data['password'] = Str::random(8);

        // Creamos el usuario
        $image = $request->file('photo');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/perfil');
        $img = Image::make($image->path());
        $img->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);

        $destinationPath = public_path('/team');
        $image->move($destinationPath, $input['imagename']);
        $data['photo'] = $input['imagename'];

        $user = User::create($data);

        // Asignamos los roles
        if($request->filled('roles')){
            $user->assignRole($request->roles);
        }
        // Asignamos los permisos
        if($request->filled('permissions')){
            $user->givePermissionTo($request->permissions);
        }
        // Enviamos el email
        UserWasCreated::dispatch($user, $data['password']);
        //regresamos al usuario
        $message="El usuario se ha creado";
        // Set a success toast, with a title
        toastr($message, 'success');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     * @throws AuthorizationException
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::where('name', '!=', 'super-admin')->with('permissions')->get();
        //if( ){
            $permissions = Permission::where('name', '!=', 'Create role')->get();
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
     * @throws AuthorizationException
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
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
     * @param User $user
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        $message="El usuario ha sido eliminado";
        // Set a success toast, with a title
        toastr($message, 'success');
        return redirect()->route('admin.users.index');

    }
}
