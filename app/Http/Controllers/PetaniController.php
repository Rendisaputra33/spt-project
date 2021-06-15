<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;

class PetaniController extends Controller
{
    // CRUD ya Guys
    public function index()
    {
        return view('welcome');
    }

    public function add(Request $req)
    {
        return Petani::insert([
            'nama_petani' => $req->nama_petani,
            'register_petani' => $req->register_petani,
            'nama_pabrik' => $req->nama_pabrik,
        ])
            ? redirect()->back()->with('success', 'data berhasil di tambah')
            : redirect()->back()->with('error', 'data gagal di tambah');
    }

    public function update(Request $req, $id)
    {
        return Petani::where('id_petani', $id)->update([
            'nama_petani' => $req->nama_petani,
            'register_petani' => $req->register_petani,
            'nama_pabrik' => $req->nama_pabrik,
        ])
            ? redirect()->back()->with('success', 'data berhasil di update')
            : redirect()->back()->with('error', 'data gagal di update');
    }

    public function delete($id)
    {
        return Petani::where('id_petani', $id)->delete()
            ? redirect()->back()->with('success', 'data berhasil di delete')
            : redirect()->back()->with('error', 'data gagal di delete');
    }

    public function getUpdate($id)
    {
        return response()->json([
            'data_update' => Petani::where('id_petani', $id)->first(),
        ]);
    }
}
