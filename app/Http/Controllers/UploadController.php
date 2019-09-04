<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UploadController extends Controller
{
    public function upload(Request $request){
        request()->validate([
            'file' => 'required|image|mimes:jpeg, png, gif|max:2048',
        ]);
        $user = User::find($request->userid);
        
        $filename = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('img'), $filename);
        $user->avatar = $filename;
        $user->save();
        return response()->json(['success' => 'That was successful', 
        'user' => $user]);
    }

    public function userimage(Request $request){
        $user = User::find($request->id);
        return $user->avatar;
    }
}