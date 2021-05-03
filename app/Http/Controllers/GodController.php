<?php

namespace App\Http\Controllers;

use App\Models\God;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class GodController extends Controller
{
    public function viewall(){
        $gods = God::with(['pantheon', 'type','damage'])->get();
        $fav_array = null;
        if(Auth::check()){
            $favorites = Auth::user()->gods;
            $fav_array = array();
            foreach($favorites as $f){
                $fav_array[] = $f->id;
            }
        }
        return view('characters.all', [
            'gods' => $gods,
            'favorites' => $fav_array
        ]);
    }

    public function random(){


        $total_gods = DB::table('gods')->count();
        $god_chosen_index = rand(1,$total_gods);
        $random_god = God::with(['pantheon', 'type','damage'])->find($god_chosen_index);

        $fav_array = null;
        if(Auth::check()){
            $favorites = Auth::user()->gods;
            $fav_array = array();
            foreach($favorites as $f){
                $fav_array[] = $f->id;
            }
        }

        return view('characters.random', [
            'id' => $random_god->id,
            'name' => $random_god->name,
            'pantheon' => $random_god->pantheon->name,
            'type' => $random_god->type->role_type,
            'damage' => $random_god->damage->damage_type,
            'favorites' => $fav_array,
        ]);
    }

    public function fav(Request $req){
        $god_id = $req->input('favorite');
        $user = Auth::user();
        $query = DB::table('god_user')->where('user_id','=',$user->id)->where('god_id','=',$god_id)->first();
        $god = God::find($god_id);
        if($query){
            $user->gods()->detach($god_id);
            return redirect()->back()->with('success', 'Removed '.$god->name.' from your favorites.');
        }
        else{
            $user->gods()->attach($god_id);
            return redirect()->back()->with('success', 'Added '.$god->name.' to your favorites.');
        }
        
    }

    public function show($id){
        
        $fav_array = null;
        if(Auth::check()){
            $favorites = Auth::user()->gods;
            $fav_array = array();
            foreach($favorites as $f){
                $fav_array[] = $f->id;
            }
        }

        $god = God::with(['pantheon', 'type','damage'])->find($id);
        return view('characters.show', [
            'god' => $god,
            'favorites' => $fav_array,
        ]);
    }
}
