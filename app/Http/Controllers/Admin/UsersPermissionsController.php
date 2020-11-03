<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersPermissionsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['role:super-admin|admin']);
//    }
    public function update(Request $request,User $user)
    {
        $user->permissions()->detach();
        if($request->filled('permissions')){
          $user->givePermissionTo($request->permissions);
        }
        $message="Los permisos se han actualizado";
        // Set a success toast, with a title
        toastr($message, 'success');
        return back();
    }
}
