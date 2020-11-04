<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('view', new Permission);
        return view('admin.permissions.index',[
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Permission $permission)
    {

        $this->authorize('update',$permission);
        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Permission $permission
     * @return void
     * @throws AuthorizationException
     */
    public function update(Request $request,Permission $permission)
    {
        $this->authorize('update', $permission);
        $data =$request->validate([
            'display_name' => 'required'
        ]);


        if($permission->update($data)){

        $message="El Permiso  se ha actualizado";
        // Set a success toast, with a title
        toastr($message, 'success');
        }else{
            $message="Error en el proceso de actualización";
            // Set a success toast, with a title
            toastr($message, 'error');

        }
        return redirect()->route('admin.permissions.edit', $permission);
    }

}
