<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\bkd\Dashboard_Bkd;
use App\Http\Controllers\bkd\Data_Cuti_Bkd;
use App\Http\Controllers\bkd\Data_Pegawai as BkdData_Pegawai;
use App\Http\Controllers\bkd\Kelola_OPD;
use App\Http\Controllers\bkd\Kelola_Pengguna;
use App\Http\Controllers\bkd\Rekapan_Cuti;

use App\Http\Controllers\LayoutController;
use App\Http\Controllers\opd\Dashboard_Opd;
use App\Http\Controllers\opd\Data_Cuti_Opd;
use App\Http\Controllers\opd\Data_Pegawai_Opd;
use App\Http\Middleware\CekUserLogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [LayoutController::class, 'index'])->middleware('auth');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => [CekUserLogin::class.':1']], function(){
        Route::get('dashboardbkd', [Dashboard_Bkd::class, 'index'])->name('dashboardbkd');
        Route::resource('kelolapegawaibkd', BkdData_Pegawai::class);
        Route::get('kelolapegawaibkd/create', [BkdData_Pegawai::class,'create']);
        Route::put('kelolapegawaibkd/{id}', [BkdData_Pegawai::class,'update']);
        Route::get('kelolapegawaibkd/{id}/edit', [BkdData_Pegawai::class,'edit']);
        Route::post('kelolapegawaibkd/store', [BkdData_Pegawai::class, 'store'])->name('kelolapegawaibkd.store');
        Route::delete('kelolapegawaibkd/{id}', [BkdData_Pegawai::class, 'destroy']);
        Route::resource('kelolaopd', Kelola_OPD::class);
        Route::get('kelolaopd/create', [Kelola_OPD::class,'create']);
        Route::put('kelolaopd/{id}', [Kelola_OPD::class,'update']);
        Route::get('kelolaopd/{id}/edit', [Kelola_OPD::class,'edit']);
        Route::post('kelolaopd/store', [Kelola_OPD::class, 'store'])->name('kelolaopd.store');
        Route::delete('kelolaopd/{id}', [Kelola_OPD::class, 'destroy']);
        Route::resource('kelolapengguna', Kelola_Pengguna::class);
        Route::get('kelolapengguna/create', [Kelola_Pengguna::class,'create']);
        Route::put('kelolapengguna/{id}', [Kelola_Pengguna::class,'update']);
        Route::get('kelolapengguna/{id}/edit', [Kelola_Pengguna::class,'edit']);
        Route::post('kelolapengguna/store', [Kelola_Pengguna::class, 'store'])->name('kelolapengguna.store');
        Route::delete('kelolapengguna/{id}', [Kelola_Pengguna::class, 'destroy']);
        Route::get('datacutibkd', [Data_Cuti_Bkd::class, 'index'])->name('datacutibkd');
        Route::get('rekapancuti', [Rekapan_Cuti::class, 'index'])->name('rekapancuti');
    });
    Route::group(['middleware' => [CekUserLogin::class.':2']], function(){
        Route::get('dashboardopd', [Dashboard_Opd::class, 'index'])->name('dashboardopd');
        Route::post('getpegawai', [Data_Cuti_Opd::class, 'getPegawai'])->name('getpegawai');
        Route::resource('datacutiopd', Data_Cuti_Opd::class);
        Route::get('kelolapegawaiopd', [Data_Pegawai_Opd::class, 'index'])->name('kelolapegawaiopd');
    });
    Route::group(['middleware' => [CekUserLogin::class.':3']], function(){
        // Route::resource('addpegawai', PegawaiController::class);
    });
});

