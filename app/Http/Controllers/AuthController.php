<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $loginSuccessful = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if($loginSuccessful){
            return redirect()->route('profile.index');
        }
        else{
            return redirect()->route('auth.loginForm')->with('error', 'Invalid Credentials');
        }
    }
}
