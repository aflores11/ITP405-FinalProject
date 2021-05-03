<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->validate([
            'username' => 'required|max:50|unique:users,name',
            'email' => 'required|email:rfc|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); 
        $userRole = Role::getUser();
        $user->role()->associate($userRole);
        $user->save();

        Auth::login($user);
        return redirect()->route('profile.index')->with('success', 'Successfully created your account!');
    }

}
