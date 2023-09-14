<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        return back()->with('success','Pendaftaran telah berhasil');
    }

    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        // $verification = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];
        if(Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password,
            ])){
            return redirect('/home');
        }return back()->with('error','Email atau Password Salah');
    }
}
