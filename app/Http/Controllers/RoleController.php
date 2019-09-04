<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;


class RoleController extends Controller
{
    //Show the role of a user
    public function index($id)
    {
        $user= User::find($id);
        //$user= User::find(1);

        $roles =  $user->role;

        return response()->json($roles);
    }

    //Set role to a user
    public function role($user_id, $role_id)
    {
        //$user= User::find(auth::user()->id);
        $user= User::find($user_id);
        $role= Role::find($role_id);


        $user->role()->attach($role);

        //return "success";

        return response()->json(['status' => 'successful']);
    }

   
}
