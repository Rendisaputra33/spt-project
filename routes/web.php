<?php

use App\Http\Controllers\PetaniController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\PgController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerangkatController;
use App\Http\Controllers\PulangContoller;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
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
    // route grouping
    Route::prefix('/group')->group(function () {
        Route::get('/search', [PetaniController::class, 'search']);
    });
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

    Route::prefix('/group')->group(function () {
        Route::get('/search', [SopirController::class, 'search']);
    });

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

    Route::prefix('/group')->group(function () {
        Route::get('/search', [WilayahController::class, 'search']);
    });

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

    Route::prefix('/group')->group(function () {
        Route::get('/search', [PgController::class, 'search']);
    });

    // route get update data Pg 
    Route::prefix('/json')->group(function () {
        Route::get('/getPg/{id}', [PgController::class, 'getUpdate']);
    });
});

Route::prefix('/auth')->group(function () {
    Route::post('/', [AuthController::class, 'Login']);
    Route::get('/logout', [AuthController::class, 'Logout']);
});

/* ================== Routing keberangkatan ================  */

Route::prefix('/berangkat')->group(function () {
    // main action
    Route::get('/', [BerangkatController::class, 'index']);
    Route::post('/', [BerangkatController::class, 'add']);
    Route::put('/{id}', [BerangkatController::class, 'update']);
    Route::delete('/{id}', [BerangkatController::class, 'destroy']);
    // secondary action
    Route::get('/search', [BerangkatController::class, 'search']);
    Route::get('/filter', [BerangkatController::class, 'filter']);
    // transaksi
    Route::get('/pulang', [PulangContoller::class, 'show']);
    // view
    Route::prefix('view')->group(function () {
        Route::get('/add', [BerangkatController::class, 'addView']);
        Route::get('/get/{id}', [BerangkatController::class, 'getUpdate']);
    });
});

Route::prefix('/pulang')->group(function () {
    // main action
    Route::get('/', [PulangContoller::class, 'index']);
    Route::post('/', [PulangContoller::class, 'add']);
    Route::put('/{id}', [PulangContoller::class, 'update']);
    Route::delete('/{id}', [PulangContoller::class, 'destroy']);
});
