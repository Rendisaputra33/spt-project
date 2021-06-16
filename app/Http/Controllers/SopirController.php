<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    // CRUD Sopir ya Guys

    public function index()
    {
        return view('tampil-data-sopir', [
            'sopir' => Sopir::get()
        ]);
    }

    public function add(Request $req)
    {
        return Sopir::insert([
            'nama_sopir' => $req->nama_sopir,
            'nohp_sopir' => $req->nohp_sopir,
            'alamat_sopir' => $req->alamat_sopir,
        ])
            ? redirect()->back()->with('success', 'data berhasil di tambah')
            : redirect()->back()->with('error', 'data gagal di tambah');
    }

    public function update(Request $req, $id)
    {
        return Sopir::where('id_sopir', $id)->update([
            'nama_sopir' => $req->nama_sopir,
            'nohp_sopir' => $req->nohp_sopir,
            'alamat_sopir' => $req->alamat_sopir,
        ])
            ? redirect()->back()->with('success', 'data berhasil di update')
            : redirect()->back()->with('error', 'data gagal di update');
    }

    public function delete($id)
    {
        return Sopir::where('id_sopir', $id)->delete()
            ? redirect()->back()->with('success', 'data berhasil di delete')
            : redirect()->back()->with('error', 'data gagal di delete');
    }

    public function getUpdate($id)
    {
        return response()->json([
            'data_update' => Sopir::where('id_sopir', $id)->first(),
        ]);
    }

    public function viewAdd()
    {
        return view('sopir');
    }
}
