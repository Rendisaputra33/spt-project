<?php

namespace App\Http\Controllers;

use App\Models\Berangkat;
use App\Models\Pembayaran;
use App\Models\Pg;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Berangkat $berangkat)
    {
        return view('tampil-data-transaksi', [
            'data' => $berangkat->get(),
            'pg' => Pg::get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetakTransaksi(Berangkat $berangkat, $id)
    {
        $data = $berangkat->where('id_keberangkatan', $id)->first();
        return view('cetak-laporan', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLaporan(Pembayaran $pembayaran)
    {
        return view('tampil-data-laporan-pembayaran', [
            'data' => $pembayaran->rightJoin('tb_transaksi', 'tb_pembayaran.id_keberangkatan', '=', 'tb_transaksi.id_keberangkatan')->get(),
            'pg' => Pg::get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetakPembayaran(Pembayaran $pembayaran, $id)
    {
        $data = $pembayaran->where('id_pembayaran', $id)->first();
        return view('cetak-laporan', ['data' => $data]);
    }
}
