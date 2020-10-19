<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        if(isset(Auth::user()->id)) return redirect()->route('articles');
        return view('admin.auth');
    }

    public function login(Request $request){
        $data = $request->all();
        $user = User::where([['phone', '=', $data['phone']], ['password', '=', $data['password']]])->first();

        if($user){
            Auth::loginUsingId($user->id, true);
            return redirect()->route('articles');
        }else{
            return back()->with(['msg' => 'Неверный логин или пароль']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('authForm');
    }
}
