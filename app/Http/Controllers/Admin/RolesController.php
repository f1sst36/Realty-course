<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RolesController extends Controller
{
    public function index(){
        $user_roles = \DB::table('user_roles')->get();
        $accesses = User::getAccesses();

        return view('admin.roles_list', compact('user_roles', 'accesses'));
    }

    public function createRoleForm(){
        $accesses = \DB::table('accesses')->get();

        return view('admin.roles_add_form', compact('accesses'));
    }

    public function createRole(Request $request){
        $data = $request->all();

        if(strlen($data['title']) < 5) return back()->withErrors(['msg' => 'Наименование должно быть больше 5 символов']);
        if(\DB::table('user_roles')->where('title', '=', $data['title'])->get()->isNotEmpty()){
            return back()->withErrors(['msg' => 'Такое наименование уже занято']);
        }
        \DB::table('user_roles')->insert([
            'title' => $data['title']
        ]);

        $role = \DB::table('user_roles')->where('title', '=', $data['title'])->first();

        $section_ids = [];
        foreach($data as $key => $section_id){
            if(preg_match('/(role-)[0-9]+/', $key)) $section_ids[] = $section_id;
        }
        
        foreach($section_ids as $section_id){
            \DB::table('access_users')->insert([
                'role_id' => $role->id,
                'section_id' => $section_id,
            ]);
        }

        return redirect()->route('roles');
    }

    public function roleDelete(Request $request){
        $data = $request->all();
        $ids = [];
        
        foreach($data as $key => $id){
            if(preg_match('/(role-)[0-9]+/', $key)) $ids[] = $id;
        }
        
        foreach($ids as $id){
            \DB::table('access_users')->where('role_id', '=', $id)->delete();
            \DB::table('user_roles')->delete($id);
        }

        return redirect()->route('roles');
    }

    public function editRoleForm($id){
        $user_role = \DB::table('user_roles')->where('id', '=', $id)->get()->first();

        $currentAccesses = \DB::table('access_users')->where('role_id', '=', $user_role->id)->get()->keyBy('section_id');
        $accesses = \DB::table('accesses')->get()->keyBy('id');

        return view('admin.roles_edit_form', compact('user_role', 'currentAccesses', 'accesses'));
    }

    public function editForm(Request $request){
        $data = $request->all();
        if(strlen($data['title']) < 5) return back()->withErrors(['msg' => 'Наименование должно быть больше 5 символов']);

        \DB::table('user_roles')->where('id', '=', $data['id'])->update([
            'title' => $data['title'],
        ]);

        $role_ids = [];
        foreach($data as $key => $role_id){
            if(preg_match('/(role-)[0-9]+/', $key)){
                $role_ids[] = $role_id;
                
            } 
        }

        \DB::table('access_users')->where('role_id', '=', $data['id'])->delete();
        foreach($role_ids as $role_id){
            \DB::table('access_users')->where('role_id', '=', $data['id'])->insert([
                'role_id' => $data['id'],
                'section_id' => $role_id,
            ]);
        }

        return redirect()->route('roles');
    }
}
