<?php

use App\Http\Controllers\PetaniController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\PgController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index']);

// Routing petani
Route::prefix('/petani')->group(function () {
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

Route::prefix('/sopir')->group(function () {
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

Route::prefix('/wilayah')->group(function () {
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

Route::prefix('/pg')->group(function () {
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
