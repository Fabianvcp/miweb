<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('view', new Role);
        return  view('admin.roles.index',[
            'roles'=> Role::where('name','!=','super-admin')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {

        $this->authorize('create', new Role);
        $permissions = Permission::get();
        $role = new Role;
        return  view('admin.roles.create', compact('permissions', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Request
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Role);
        $data =$request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = Role::create($data);
        if ($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }
        $message="El rol  se ha creado";
        // Set a success toast, with a title
        toastr($message, 'success');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return void
     * @throws AuthorizationException
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        $permissions = Permission::get();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return void
     * @throws AuthorizationException
     */
    public function update(Request $request,Role $role)
    {
        $this->authorize('update', $role);
        $data =$request->validate([
            'display_name' => 'required'
        ]);


        $role->update($data);

        $role->permissions()->detach();
        if ($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }
        $message="El rol  se ha actualizado";
        // Set a success toast, with a title
        toastr($message, 'success');
        return redirect()->route('admin.roles.edit', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return void
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);
        $role->delete();

        $message="El rol  se ha eliminado";
        // Set a success toast, with a title
        toastr($message, 'success');
        return redirect()->route('admin.roles.index');
    }
}
