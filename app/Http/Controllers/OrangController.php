<?php

namespace App\Http\Controllers;

use App\Models\Orang;
use App\Http\Requests\StoreOrangRequest;
use App\Http\Requests\UpdateOrangRequest;

class OrangController extends Controller
{
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
     * @param  \App\Http\Requests\StoreOrangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function show(Orang $orang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function edit(Orang $orang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrangRequest  $request
     * @param  \App\Models\Orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrangRequest $request, Orang $orang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orang $orang)
    {
        //
    }
}
