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
        $accesses = User::getAccesses();

        return view('admin.user_list', compact('users', 'accesses'));
    }

    public function createUserForm(){
        $roles = \DB::table('user_roles')->get();

        return view('admin.user_add_form', compact('roles'));
    }

    public function createUser(UserRequest $request){
        $data = $request->all();
        if($data['password'] != $data['re_password']) return back()->withErrors(['msg' => 'Пароли не совпадают']);
        $data[] = ['created_at' => date('Y-m-d H:i:s', time() + 3 * 3600)];
        $user = (new User)->fill($data);
        // dd($user, $data);
        if($user){
            $user->save();
            return redirect()->route('users')->with(['success' => 'Пользователь успешно создан']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка создания пользователя']);
        }
    }

    public function editUserForm($id){
        $user = User::findOrFail($id);
        $roles = \DB::table('user_roles')->get();

        return view('admin.user_edit_form', compact('user', 'roles'));
    }

    public function editUser(UserRequest $request){
        $data = $request->all();
        if($data['password'] != $data['re_password']) return back()->withErrors(['msg' => 'Пароли не совпадают']);
        $data[] = ['updated_at' => date('Y-m-d H:i:s', time() + 3 * 3600)];

        $user = User::findOrFail($data['id']);
        $user->update($data);
        return redirect()->route('users');
    }

    public function deleteUser(Request $request){
        $data = $request->all();
        $ids = [];
        
        foreach($data as $key => $id){
            if(preg_match('/(user-)[0-9]+/', $key)) $ids[] = $id;
        }
        
        foreach($ids as $id){
            User::destroy($id);
        }

        return redirect()->route('users');
    }
}
