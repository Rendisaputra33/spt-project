<?php

use App\Http\Controllers\PetaniController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\PgController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index']);


Route::get('/dashboard', function () {
    return view('tampil-data-petani');
});

/* ===================== Routing petani =================  */

// Routing petani
Route::prefix('/petani')->group(function () {
    // route to view pg
    Route::prefix('/view')->group(function () {
        Route::get('/add', [PetaniController::class, 'viewAdd']);
    });
    // route crud petani
    Route::get('/', [PetaniController::class, 'index']);
    Route::post('/', [PetaniController::class, 'add']);
    Route::put('/{id}', [PetaniController::class, 'update']);
    Route::delete('/{id}', [PetaniController::class, 'delete']);
    // route get update data petani
    Route::prefix('/json')->group(function () {
        Route::get('/getPetani/{id}', [PetaniController::class, 'getUpdate']);
    });
});

/* ===================== Routing sopir =================  */

Route::prefix('/sopir')->group(function () {
    // route to view pg
    Route::prefix('/view')->group(function () {
        Route::get('/add', [SopirController::class, 'viewAdd']);
    });
    // route crud sopir
    Route::get('/', [SopirController::class, 'index']);
    Route::post('/', [SopirController::class, 'add']);
    Route::put('/{id}', [SopirController::class, 'update']);
    Route::delete('/{id}', [SopirController::class, 'delete']);
    // route get update data sopir
    Route::prefix('/json')->group(function () {
        Route::get('/getSopir/{id}', [SopirController::class, 'getUpdate']);
    });
});

/* ===================== Routing wilayah =================  */

Route::prefix('/wilayah')->group(function () {
    // route to view pg
    Route::prefix('/view')->group(function () {
        Route::get('/add', [WilayahController::class, 'viewAdd']);
    });
    // route crud Wilayah
    Route::get('/', [WilayahController::class, 'index']);
    Route::post('/', [WilayahController::class, 'add']);
    Route::put('/{id}', [WilayahController::class, 'update']);
    Route::delete('/{id}', [WilayahController::class, 'delete']);
    // route get update data Wilayah
    Route::prefix('/json')->group(function () {
        Route::get('/getWilayah/{id}', [WilayahController::class, 'getUpdate']);
    });
});

/* ===================== Routing pg =================  */

Route::prefix('/pg')->group(function () {
    // route to view pg
    Route::prefix('/view')->group(function () {
        Route::get('/add', [PgController::class, 'viewAdd']);
    });
    // route crud Pg
    Route::get('/', [PgController::class, 'index']);
    Route::post('/', [PgController::class, 'add']);
    Route::put('/{id}', [PgController::class, 'update']);
    Route::delete('/{id}', [PgController::class, 'delete']);
    // route get update data Pg 
    Route::prefix('/json')->group(function () {
        Route::get('/getPg/{id}', [PgController::class, 'getUpdate']);
    });
});
