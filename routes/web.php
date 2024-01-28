<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Bkd;
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
});

