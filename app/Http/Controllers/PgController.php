<?php

namespace App\Http\Controllers;

use App\Models\Pg;
use Illuminate\Http\Request;

class PgController extends Controller
{
    // CRUD pg ya Guys

    public function index()
    {
        return view('tampil-data-pg', [
            'pg' => Pg::get()
        ]);
    }

    public function add(Request $req)
    {
        return Pg::insert([
            'nama_pg' => $req->nama_pg,
            'lokasi_pg' => $req->lokasi_pg,
        ])
            ? redirect()->back()->with('success', 'data berhasil di tambah')
            : redirect()->back()->with('error', 'data gagal di tambah');
    }

    public function update(Request $req, $id)
    {
        return Pg::where('id_pg', $id)->update([
            'nama_pg' => $req->nama_pg,
            'lokasi_pg' => $req->lokasi_pg,
        ])
            ? redirect()->back()->with('success', 'data berhasil di update')
            : redirect()->back()->with('error', 'data gagal di update');
    }

    public function delete($id)
    {
        return Pg::where('id_pg', $id)->delete()
            ? redirect()->back()->with('success', 'data berhasil di delete')
            : redirect()->back()->with('error', 'data gagal di delete');
    }

    public function getUpdate($id)
    {
        return response()->json([
            'data_update' => Pg::where('id_pg', $id)->first(),
        ]);
    }

    public function viewAdd()
    {
        return view('pg');
    }
}
