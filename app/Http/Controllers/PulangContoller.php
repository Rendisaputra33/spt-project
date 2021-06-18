<?php

namespace App\Http\Controllers;

use App\Models\Berangkat;
use Illuminate\Http\Request;

class PulangContoller extends Controller
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
     * @param  \App\Models\Berangkat  $berangkat
     * @return \Illuminate\Http\Response
     */
    public function show(Berangkat $berangkat)
    {
        return view('tampil-data-pulang', [
            'data' => $berangkat->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berangkat  $berangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Berangkat $berangkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berangkat  $berangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berangkat $berangkat, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berangkat  $berangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berangkat $berangkat, $id)
    {
        //
    }
}
