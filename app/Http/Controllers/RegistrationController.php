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
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); 
        $userRole = Role::getUser();
        $user->role()->associate($userRole);
        $user->save();

        Auth::login($user);
        return redirect()->route('profile.index');
    }

}
