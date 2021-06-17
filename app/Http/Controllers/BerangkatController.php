<?php

namespace App\Http\Controllers;

use App\Models\Berangkat;
use Illuminate\Http\Request;

class BerangkatController extends Controller
{
    public function index()
    {
        return view('berangkat');
    }

    public function add(Request $req)
    {
        return Berangkat::insert([
            'tanggal_berangkat' => $req->tanggal_berangkat,
            'tipe' => $req->tipe,
            'no_sp' => $req->no_sp,
            'no_induk' => $req->no_induk,
            'wilayah' => $req->wilayah,
            'nama_petani' => $req->nama_petani,
            'nama_sopir' => $req->nama_sopir,
            'pabrik_tujuan' => $req->pabrik_tujuan,
            'sangu' => $req->sangu,
            'berat_timbang' => $req->berat_timbang,
            'tara_mbl' => $req->tara_mbl,
            'netto' => $req->netto,
            'harga' => $req->harga,
        ])
            ? redirect('/berangkat')->with('success', 'sukses tambah data')
            : redirect()->back()->with('error', 'gagal menambah data');
    }
}
