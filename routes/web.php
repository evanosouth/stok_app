<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\suplierController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login_proses']);

Route::middleware(['auth', 'cekLevel:superadmin,admin'])->group(function(){

    /**
     * ini routing tombol logout!!!
     */
    Route::get('/logout', [AuthController::class, 'logout']);

    /**
     * ini Routing dashboard Controller
     */
    Route::get('/dashboard', [dashboardController::class, 'index']);

    /**
     * Ini Routing untuk pegawai controller
     */
    Route::controller(pegawaiController::class)->group(function(){
        Route::get('/pegawai', 'index');

        Route::post('/pegawai/add', 'store')->name('savePegawai');

        Route::get('/pegawai/edit/{id}', 'edit');
        Route::post('/pegawai/edit/{id}', 'update');

        Route::get('/pegawai/{id}', 'destroy');
    });

    /**
     * Ini route Stok
     */
    Route::controller(stokController::class)->group(function(){
        Route::get('/stok', 'index');

        Route::get('/stok/add', 'create');
        Route::post('/stok/add', 'store')->name('saveStok');

    });


    /**
     * ini route barang masuk
     */


    /**
     * ini route barang keluar
     */


    /**
     * ini route pelanggan
     */
    Route::controller(pelangganController::class)->group(function(){
        Route::get('/pelanggan', 'index');

        Route::get('/pelanggan/add', 'create');
        Route::post('/pelanggan/add', 'store');

        Route::get('/pelanggan/edit/{id}', 'edit');
        Route::post('/pelanggan/edit/{id}', 'update');

        Route::get('/pelanggan/{id}', 'destroy');

    });

    /**
     * ini route suplier
     */
    Route::controller(suplierController::class)->group(function(){
        Route::get('/suplier', 'index');
        
        Route::get('/suplier/add', 'create');
        Route::post('suplier/add', 'store');
        
        Route::get('suplier/edit/{id}', 'edit');
        Route::post('suplier/edit/{id}', 'update');
        
        Route::get('/suplier/{id}', 'destroy');
    });



});

