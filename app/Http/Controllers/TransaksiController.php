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
            'list' => $berangkat->whereNotNull('tanggal_pulang')->orderBy('id_keberangkatan', 'desc')->get(),
            'pg' => Pg::get(),
            'title' => 'Transaksi'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetakTransaksi(Berangkat $berangkat, Request $req)
    {
        $tgl = explode(' / ', $req->tanggal);
        return view('cetak-laporan', [
            'data' => $berangkat->whereBetween('created_at', [tanggal2($tgl[0]), tanggal2($tgl[1])])
                ->where('tipe', $req->tipe)
                ->where('pabrik_tujuan', $req->pabrik)
                ->get(),
            'title' => 'Cetak | Transaksi'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLaporan(Pembayaran $pembayaran)
    {
        foreach ($pembayaran->getPembayaran() as $item) :
            $this->data[] = [
                'invoice' => $item->no_invoice,
                'petani' => $item->nama_sopir,
                'tgl' => $item->tgl,
                'list_sp' => $item->sp,
            ];
        endforeach;
        return view('tampil-data-laporan-pembayaran', [
            'list' => !isset($this->data) ? [] : $this->data,
            'pg' => Pg::get(),
            'title' => 'Laporan | Pembayaran'
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
