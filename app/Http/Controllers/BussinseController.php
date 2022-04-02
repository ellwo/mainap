<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use Illuminate\Http\Request;

class BussinseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(['ss'=>'yes'],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function show(Bussinse $bussinse)
    {
        //
      //  $bussinse=Bussinse::find(request('id'));
        return response($bussinse,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function edit(Bussinse $bussinse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bussinse $bussinse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussinse $bussinse)
    {
        //
    }
}
