<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;

class PetaniController extends Controller
{
    // CRUD ya Guys

    /**
     * @return View
     */
    public function index()
    {
        return view('tampil-data-petani', [
            'petani' => Petani::get()
        ]);
    }

    /**
     * @param Request this param is requested form user
     * @return Redirect this return is redirect type
     */
    public function add(Request $req)
    {
        return Petani::insert([
            'nama_petani' => $req->nama_petani,
            'register_petani' => $req->register_petani,
            'nama_pabrik' => $req->nama_pabrik,
        ])
            ? redirect('/petani')->with('success', 'data berhasil di tambah')
            : redirect()->back()->with('error', 'data gagal di tambah');
    }

    /**
     * @param Request this param is requested form user
     * @return Redirect this return is redirect type
     */
    public function update(Request $req, $id)
    {
        return Petani::where('id_petani', $id)->update([
            'nama_petani' => $req->nama_petani,
            'register_petani' => $req->register_petani,
            'nama_pabrik' => $req->nama_pabrik,
        ])
            ? redirect('/petani')->with('success', 'data berhasil di update')
            : redirect()->back()->with('error', 'data gagal di update');
    }

    /**
     * @param id this param is requested form user
     * @return Redirect this return is redirect type
     */
    public function delete($id)
    {
        return Petani::where('id_petani', $id)->delete()
            ? redirect('/petani')->with('success', 'data berhasil di delete')
            : redirect()->back()->with('error', 'data gagal di delete');
    }

    /**
     * @param Request this param is requested form user
     * @return JSON this return is JSON type
     */
    public function getUpdate($id)
    {
        return response()->json([
            'data_update' => Petani::where('id_petani', $id)->first()
        ]);
    }

    /**
     * @return View 
     */
    public function viewAdd()
    {
        return view('petani');
    }

    /**
     * @param Query parameters
     * @return String this return string html
     */
    public function search()
    {
        $data = Petani::where('nama_petani', 'LIKE', '%' . request('name') . '%')->get();
        return response()->json(['data' => $data]);
    }
}
