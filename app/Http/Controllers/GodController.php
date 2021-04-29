<?php

namespace App\Http\Controllers;

use App\Models\God;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
}
