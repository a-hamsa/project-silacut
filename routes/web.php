<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Bkd;
use App\Http\Controllers\bkd\Data_Cuti;
use App\Http\Controllers\bkd\Data_Pegawai as BkdData_Pegawai;
use App\Http\Controllers\bkd\Kelola_OPD;
use App\Http\Controllers\bkd\Kelola_Pengguna;
use App\Http\Controllers\bkd\Rekapan_Cuti;
use App\Http\Controllers\KetegoriController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\Opd;
use App\Http\Controllers\opd\Data_Pegawai;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Middleware\CekUserLogin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('login', [LoginController::class,'index'])->name('login');

Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => [CekUserLogin::class.':1']], function(){
        // Route::get('kelolapegawaibkd', [BkdData_Pegawai::class,'index'])->name('kelolapegawaibkd');
        Route::resource('kelolapegawaibkd', BkdData_Pegawai::class);
        Route::get('kelolapegawaibkd/create', [BkdData_Pegawai::class,'create']);
        Route::put('kelolapegawaibkd/{id}', [BkdData_Pegawai::class,'update']);
        Route::get('kelolapegawaibkd/{id}/edit', [BkdData_Pegawai::class,'edit']);
        Route::post('kelolapegawaibkd/store', [BkdData_Pegawai::class, 'store'])->name('kelolapegawaibkd.store');
        Route::delete('kelolapegawaibkd/{id}', [BkdData_Pegawai::class, 'destroy']);
        //
        Route::resource('kelolaopd', Kelola_OPD::class);
        Route::get('kelolaopd/create', [Kelola_OPD::class,'create']);
        Route::put('kelolaopd/{id}', [Kelola_OPD::class,'update']);
        Route::get('kelolaopd/{id}/edit', [Kelola_OPD::class,'edit']);
        Route::post('kelolaopd/store', [Kelola_OPD::class, 'store'])->name('kelolaopd.store');
        Route::delete('kelolaopd/{id}', [Kelola_OPD::class, 'destroy']);
        //
        Route::resource('kelolapengguna', Kelola_Pengguna::class);
        Route::get('kelolapengguna/create', [Kelola_Pengguna::class,'create']);
        Route::put('kelolapengguna/{id}', [Kelola_Pengguna::class,'update']);
        Route::get('kelolapengguna/{id}/edit', [Kelola_Pengguna::class,'edit']);
        Route::post('kelolapengguna/store', [Kelola_Pengguna::class, 'store'])->name('kelolapengguna.store');
        Route::delete('kelolapengguna/{id}', [Kelola_Pengguna::class, 'destroy']);
        //
        Route::get('datacuti', [Data_Cuti::class, 'index'])->name('datacuti');
        //
        Route::get('rekapancuti', [Rekapan_Cuti::class, 'index'])->name('rekapancuti');
    });
    Route::group(['middleware' => [CekUserLogin::class.':2']], function(){
        //Route::resource('addpegawai', PegawaiController::class);
        Route::get('opd/kelolapegawai', [Data_Pegawai::class,'index'])->name('kelolapegawai');
        Route::get('opd/kelolapegawai/create', [Data_Pegawai::class,'create'])->name('kelolapegawai.create');
        Route::put('opd/kelolapegawai/{id}', [Data_Pegawai::class,'update'])->name('kelolapegawai.update');
        Route::get('opd/kelolapegawai/{id}/edit', [Data_Pegawai::class,'edit'])->name('kelolapegawai.edit');
        Route::post('opd/kelolapegawai/store', [Data_Pegawai::class, 'store'])->name('kelolapegawai.store');
        Route::delete('opd/kelolapegawai/{id}', [Data_Pegawai::class, 'destroy'])->name('kelolapegawai.destroy');
    });
    Route::group(['middleware' => [CekUserLogin::class.':3']], function(){
        //Route::resource('addpegawai', PegawaiController::class);
    });
});

