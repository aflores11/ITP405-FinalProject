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
        return view('characters.show', [
            'gods' => $gods,
        ]);
    }

    public function random(){


        $total_gods = DB::table('gods')->count();
        $god_chosen_index = rand(1,$total_gods);
        $random_god = God::with(['pantheon', 'type','damage'])->find($god_chosen_index);

        return view('characters.random', [
            'name' => $random_god->name,
            'pantheon' => $random_god->pantheon->name,
            'type' => $random_god->type->role_type,
            'damage' => $random_god->damage->damage_type
        ]);
    }

    public function fav(Request $req){
        $god_id = $req->input('favorite');
        $query = Favorite::where('user_id','=',Auth::user()->id)->where('god_id','=',$god_id)->first();
        if($query){
            $query->delete();
        }
        else{

            $new_entry = new Favorite();
            $new_entry->user_id = Auth::user()->id;
            $new_entry->god_id = $god_id;
            $new_entry->save();

        }
        return redirect()->back()->with('success', 'saved');
    }
}
