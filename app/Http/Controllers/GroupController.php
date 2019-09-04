<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Group;
use App\User;

class GroupController extends Controller
{
    //Display all groups
    public function index()
    {
        $groups = Group::paginate(5);

        return response()->json($groups);
    }


    //Create a new group
    public function create(Request $request)
    {
        $group =new Group;

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        $group->name = $request->name;
        $group->decription = $request->description;
        $group->amount = $request->amount;
        $group->save();


        return response()->json($group);
    }

   //Adding a user to a group
    public function join($group, $user)
    {
        $group = Group::find($group);
        $user = User::find($user);

        //  $group->user()->attach($user);

        //  return "done!";

        if($user->group()->attach($group)){
            return response()->json([ 'status'=> 'successful'], 200);
        }else{
            return response()->json([ 'status'=> 'unsuccessful' ], 200);
        }

    }

    //Edit group Details
    public function edit($id)
    {
        $group = Group::find($id);

        $group->name = input('name');
        $group->decription = input('description');
        $group->amount = input('amount');

        $group->save();

        return response()->json($groups);
    }


    //Fetching the groups a user belong
    public function group($id)
    {
        $user= User::find($id);
        $result = $user->group;
        return response()->json($result);
    }

    
}
