<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembayaran extends Model
{
    protected $table = 'tb_pembayaran';

    public function getLast($tgl1, $tgl2)
    {
        $query = "SELECT * FROM tb_pembayaran WHERE(created_at BETWEEN '{$tgl1}' AND '{$tgl2}')";
        return DB::select("select * from tb_pembayaran where(created_at BETWEEN '{$tgl1}' AND '{$tgl2}') AND tanggal_kepulangan = null");
    }
}
