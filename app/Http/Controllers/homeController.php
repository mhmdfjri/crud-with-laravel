<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function logout(){
        Auth::logout();
        return redirect()->to('login');
    }
}
