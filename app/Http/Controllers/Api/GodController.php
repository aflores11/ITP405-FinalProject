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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\God  $god
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, God $god)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\God  $god
     * @return \Illuminate\Http\Response
     */
    public function destroy(God $god)
    {
        //
    }
}
