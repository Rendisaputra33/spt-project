<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Berangkat;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function FilterBData(Request $req)
    {
        return response()->json(['data' => Berangkat::whereBetween('created_at', [$req->tgl1, $req->tgl2])->get(), 'tgl2' => $req->tgl2, 'tgl1' => $req->tgl1]);
    }

    public function FilterData(Request $req)
    {
        return response()->json(['data' => Berangkat::whereBetween('updated_at', [$req->tgl1, $req->tgl2])->get(), 'tgl2' => $req->tgl2, 'tgl1' => $req->tgl1]);
    }

    public function FilterPData(Request $req)
    {
        return response()->json(['data' => Pembayaran::whereBetween('tanggal_bayar', [$req->tgl1, $req->tgl2])->get(), 'tgl2' => $req->tgl2, 'tgl1' => $req->tgl1]);
    }
}
