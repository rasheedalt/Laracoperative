<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email'=> request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success, 'user' => $user], 200);
        }else{
            return response()->json(['error' => 'Unauthorised'], 404);

        }
    }

    public function register(Request $request){
        $validator =
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required | unique:users',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
         $input = $request->all();
         $input['password'] = hash::make($input['password']);
         //return $input['password'];
        //  $user = new User;
        //  $user->email = $input['email'];
        //  $user->password = $input['password'];
        //  $user->name = $input['name'];
       $user =  User::create($input);
         return response()->json([$user], 200);
        
    }

    public function now(Request $request){
        dd($request->file);
    }
}
