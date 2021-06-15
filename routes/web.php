<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/laporan', function () {
    return view('laporan');
});
Route::get('/cetak', function () {
    return view('hasilcetak');
});
Route::get('/laporan-hutang', function () {
    return view('laporanhutang');
});
Route::get('/detail-hutang', function () {
    return view('detailhutang');
});
Route::get('/rincian-pembayaran', function () {
    return view('rincianpembayaran');
});
Route::get('/ambil-hutang', function () {
    return view('ambilhutang');
});
Route::get('/bayar-hutang', function () {
    return view('bayarhutang');
});