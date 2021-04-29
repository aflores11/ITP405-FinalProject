<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class GodController extends Controller
{
    public function viewall(){
        
    }

    public function random(){
        $total_gods = DB::table('gods')->count();
    }
}
