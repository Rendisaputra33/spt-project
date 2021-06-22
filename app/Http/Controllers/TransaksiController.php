<?php

namespace App\Http\Controllers;

use App\Models\Berangkat;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Berangkat $berangkat)
    {
        return view('tampil-data-transaksi', [
            'data' => $berangkat->get()
        ]);
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
     * @param  \App\Models\Berangkat  $Berangkat
     * @return \Illuminate\Http\Response
     */
    public function show(Berangkat $Berangkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berangkat  $Berangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Berangkat $Berangkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berangkat  $Berangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berangkat $Berangkat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berangkat  $Berangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berangkat $Berangkat)
    {
        //
    }
}
