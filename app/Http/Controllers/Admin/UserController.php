<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.user_list', compact('users'));
    }

    public function createUserForm(){
        $roles = \DB::table('user_roles')->get();

        return view('admin.user_add_form', compact('roles'));
    }

    public function createUser(UserRequest $request){
        dd($request->all());
    }
}
