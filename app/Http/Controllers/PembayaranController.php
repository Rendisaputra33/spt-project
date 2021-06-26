<?php

namespace App\Http\Controllers;

use App\Models\Berangkat;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pembayaran $pembayaran)
    {
        foreach ($pembayaran->getGlobal() as $item) :
            $this->data[] = [
                'invoice' => $item->no_invoice,
                'sub_total' => $item->sub_total,
                'list_petani' => explode(',', $item->petani),
                'list_tipe' => explode(',', $item->type),
                'tgl' => $item->tgl,
                'harga' => $item->hrg,
            ];
        endforeach;
        return view('tampil-data-bayar', [
            'data' => $this->data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    private function makeId(Pembayaran $pembayaran)
    {
        $last = $pembayaran->latest()->first();
        $pecah = $last === null ? 0 : explode("/", $last['no_invoice']);
        $parseid = $last === null ? 0 : (int) $pecah[0];
        return "{$this->makeZero($parseid)}/INV/{$this->getMounth(date('m'))}/" . date('Y');
    }

    public function makeZero($id)
    {
        if ($id < 9) {
            return '00' . ($id += 1);
        } elseif ($id < 99) {
            return '0' . ($id += 1);
        } else {
            return $id += 1;
        }
    }

    public function getMounth($intMounth)
    {
        $im = (int) $intMounth;
        $mounth = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        return $mounth[$im - 1];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Berangkat $berangkat, Pembayaran $pembayaran, Request $req)
    {
        $invoice = $this->makeId($pembayaran);
        $status = false;
        foreach ($req->id as $item) :
            $data = $berangkat->where('id_keberangkatan', $item)->first();
            $pembayaran->insert([
                'no_invoice' => $invoice,
                'harga' => $data['harga'],
                'tanggal_bayar' => now(),
                'nominal' => $data['harga'] * $data['netto'],
                'netto' => $data['netto'],
                'id_keberangkatan' => $data['id_keberangkatan']
            ]) ? $status = true : $status = false;
        endforeach;
        $list = $pembayaran->join('tb_transaksi', 'tb_pembayaran.id_keberangkatan', '=', 'tb_transaksi.id_keberangkatan')->whereIn('tb_pembayaran.id_keberangkatan', $req->id)->get();
        return $status === true ? view('cetak-invoice', ['data' => $list, 'inv' => $invoice]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Berangkat $berangkat)
    {
        $data = Pembayaran::select('id_keberangkatan')->get();
        return view('list-dibayar', [
            'data' => $berangkat->whereNotNull('tanggal_pulang')->whereNotIn('id_keberangkatan', $data)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran, $id)
    {
        return $pembayaran->where('id_pembayaran', $id)->delete()
            ? redirect()->back()->with('sukses', 'data berhasil di hapus')
            : redirect()->back()->with('error', 'data gagal di hapus');
    }
}
