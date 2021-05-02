<?php

namespace App\Http\Controllers;

use App\Models\Damage;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        // $favorites = $user->gods();
        // dd($favorites);
        return view('profile.index',[
            'user' => $user,
        ]);
    }
}
