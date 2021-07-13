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
        return view('tampil-data-user', [
            'user' => User::get(),
            'title' => 'User'
        ]);
    }
    
    public function add(Request $req)
    {   
        if ($req->validate(['username' => 'unique:tb_user,username'])){
            return User::insert([
                'nama_user' => $req->nama_user,
                'username' => $req->username,
                'pass_user' => bcrypt($req->pass_user),
                'level' => $req->level
            ])
                ? redirect('/user')->with('sukses', 'data berhasil di tambah')
                : redirect()->back()->with('error', 'data gagal di tambah');
        }
        else{
            return redirect('/user')->with('error', 'username sudah terdaftar');
        }
    }
    public function update(Request $req, $id)
    {
        return User::where('id_user', $id)->update([
            'nama_user' => $req->unama_user,
            'username' => $req->uusername,
            'pass_user' => bcrypt($req->upass_user),
            'level' => $req->ulevel
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
        $data = User::where('nama_user', 'LIKE', $param)
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
