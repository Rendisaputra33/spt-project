<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index()
    {
        return view('login');
    }


    public function viewIndex()
    {
        return view('tampil-data-user');
    }
    
    public function add(Request $req)
    {
        return User::insert([
            'nama_user' => $req->nama_user,
            'username' => $req->username,
            'password' => bcrypt($req->pass_user),
            'level' => $req->level
        ]);
    }
    public function update(Request $req, $id)
    {
        return User::where('id_user', $id)->update([
            'nama_user' => $req->nama_user,
            'username' => $req->username,
            'password' => bcrypt($req->pass_user),
            'level' => $req->level
        ])
            ? redirect('/user')->with('sukses', 'data berhasil di update')
            : redirect()->back()->with('error', 'data gagal di update');
    }
    public function delete($id)
    {
        return User::where('id_user', $id)->delete()
            ? redirect('/user')->with('sukses', 'data berhasil di delete')
            : redirect()->back()->with('error', 'data gagal di delete');
    }
    public function search()
    {
        $param = '%' . request('name') . '%';
        $data = Petani::where('nama_user', 'LIKE', $param)
            ->orWhere('username', 'LIKE', $param)
            ->orWhere('level', 'LIKE', $param)
            ->get();
        return response()->json(['data' => $data]);
    }
    public function getUpdate($id)
    {
        return response()->json([
            'data_update' => User::where('id_user', $id)->first()
        ]);
    }
}
