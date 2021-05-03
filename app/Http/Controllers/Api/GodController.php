<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\God;
use Illuminate\Http\Request;

class GodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return God::all();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\God  $god
     * @return \Illuminate\Http\Response
     */
    public function show(God $god)
    {
        return $god;
    }


}
