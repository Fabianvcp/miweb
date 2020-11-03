<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['role:super-admin|admin']);
//    }
    public function update(Request $request, User $user)
    {
        $user->roles()->detach();
        if($request->filled('roles')){
            $user->assignRole($request->roles);
        }

        $message="Los roles se han actualizado";
        // Set a success toast, with a title
        toastr($message, 'success');
        return back();
    }
}
