<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'LoginController@login');

Route::post('files', 'LoginController@now');

Route::post('register', 'LoginController@register');

// Create a group
Route::post('create', 'GroupController@create');

//get user image file
Route::post('image', "UploadController@userimage");

//Upolad a profile picture
Route::post('upload', 'UploadController@upload');


// show all the available groups
Route::get('groups', 'GroupController@index');

// join a group
Route::put('join/{group}/{user}', 'GroupController@join');

// get the roles a user belong
Route::get('role/{id}', 'RoleController@index');

// get the group a user belong
Route::get('group/{id}', 'GroupController@group');

// Edit group details
Route::put('group/{id}', 'GroupController@edit');

// Attach role to a user
Route::put('role/{user}/{group}', 'RoleController@role');
