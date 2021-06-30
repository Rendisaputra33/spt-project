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
    public function cetakTransaksi(Berangkat $berangkat, $id)
    {
        $data = $berangkat->where('id_keberangkatan', $id)->first();
        return view('cetak-laporan', ['data' => $data, 'title' => 'Cetak | Transaksi']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLaporan(Pembayaran $pembayaran)
    {
        foreach ($pembayaran->getGlobal() as $item) :
            $this->data[] = [
                'invoice' => $item->no_invoice,
                'sub_total' => $item->sub_total,
                'petani' => $item->nama_sopir,
                'list_pemilik' => explode(',', $item->pemilik),
                'list_tipe' => explode(',', $item->type),
                'tgl' => $item->tgl,
                'harga' => $item->hrg,
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
