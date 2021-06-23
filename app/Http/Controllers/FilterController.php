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

    public function FilterPData(Request $req)
    {
        return response()->json(['data' => Pembayaran::whereBetween('tanggal_bayar', [$req->tgl1, $req->tgl2])->get(), 'tgl2' => $req->tgl2, 'tgl1' => $req->tgl1]);
    }

    public function FilterTData(Request $req)
    {
        return response()->json([
            'data' => Berangkat::whereBetween('created_at', [$req->tgl1, $req->tgl2])
                ->where('tipe', $req->type)
                ->where('pabrik_tujuan', $req->tujuan)
                ->get()
        ]);
    }

    public function FilterLPData(Request $req)
    {
        return response()->json([
            'data' => Pembayaran::rightJoin('tb_pembayaran', 'tb_transaksi.id_keberangkatan', '=', 'tb_pembayaran.id_keberangkatan')->whereBetween('tb_pembayaran.created_at', [$req->tgl1, $req->tgl2])
                ->where('tipe', $req->type)
                ->where('pabrik_tujuan', $req->tujuan)
                ->get()
        ]);
    }
}
