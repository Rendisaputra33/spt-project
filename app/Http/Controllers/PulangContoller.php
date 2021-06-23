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
    public function index(Berangkat $berangkat)
    {
        return view('tampil-data-pulang', [
            'data' => $berangkat->whereNotNull('tanggal_pulang')->whereDate('updated_at', now())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req, Berangkat $berangkat, $id)
    {
        return $berangkat
            ->where('id_keberangkatan', $id)
            ->update([
                'tanggal_pulang' => $req->tanggal_pulang,
                'tanggal_bongkar' => $req->tanggal_bongkar,
                'no_truk' => $req->no_truk,
                'berat_pulang' => $req->berat_pulang,
                'refaksi' => $req->refaksi
            ]) ? redirect('/pulang') : redirect()->back();
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
        return view('list-dipulangkan', [
            'data' => $berangkat->whereNull('tanggal_pulang')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berangkat  $berangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Berangkat $berangkat, Request $req, $id)
    {
        return $berangkat->where('id_keberangkatan', $id)->update([
            'tanggal_pulang' => $req->tanggal_pulang,
            'tanggal_bongkar' => $req->tanggal_bongkar,
            'no_truk' => $req->no_truk,
            'berat_pulang' => $req->berat_pulang,
            'refaksi' => $req->refaksi,
            'netto_pulang' => $req->berat_pulang - $req->refaksi,
            'updated_at' => now()
        ]) ? redirect()->back() : redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berangkat  $berangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Berangkat $berangkat, $id)
    {
        return response()->json([
            'data' => $berangkat->where('id_keberangkatan', $id)->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berangkat  $berangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berangkat $berangkat, $id)
    {
        return $berangkat->where('id_keberangkatan', $id)->delete()
            ? redirect('/pulang') : redirect('/pulang');
    }

    public function cetak(Berangkat $berangkat)
    {
        return view('laporan-pulang', [
            'data' => $berangkat->whereNotNull('tanggal_pulang')->whereDate('updated_at', now())->get()
        ]);
    }
}
