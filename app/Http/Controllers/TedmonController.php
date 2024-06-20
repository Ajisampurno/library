<?php

namespace App\Http\Controllers;

use App\Models\Tedmon;
use App\Http\Requests\StoreTedmonRequest;
use App\Http\Requests\UpdateTedmonRequest;

class TedmonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.publisers.index');
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
     * @param  \App\Http\Requests\StoreTedmonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTedmonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tedmon  $tedmon
     * @return \Illuminate\Http\Response
     */
    public function show(Tedmon $tedmon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tedmon  $tedmon
     * @return \Illuminate\Http\Response
     */
    public function edit(Tedmon $tedmon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTedmonRequest  $request
     * @param  \App\Models\Tedmon  $tedmon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTedmonRequest $request, Tedmon $tedmon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tedmon  $tedmon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tedmon $tedmon)
    {
        //
    }
}
