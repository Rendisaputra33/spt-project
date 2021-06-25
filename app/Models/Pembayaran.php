<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembayaran extends Model
{
    protected $table = 'tb_pembayaran';

    public function getGlobal()
    {
        return DB::select('SELECT no_invoice, SUM(nominal) as sub_total, GROUP_CONCAT(nama_petani) as petani FROM tb_pembayaran JOIN tb_transaksi ON tb_pembayaran.id_keberangkatan = tb_transaksi.id_keberangkatan GROUP BY no_invoice');
    }
}