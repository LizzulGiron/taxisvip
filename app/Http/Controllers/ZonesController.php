<?php

namespace App\Http\Controllers;

use App\Zones;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function show(Zones $zones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function edit(Zones $zones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zones $zones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zones $zones)
    {
        //
    }
}
