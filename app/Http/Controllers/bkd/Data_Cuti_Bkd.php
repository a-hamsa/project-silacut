<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tb_Cuti;
use App\Models\Tb_Golongan;
use App\Models\Tb_Jabatan;
use App\Models\Tb_Jenis_Kelamin;
use App\Models\Tb_Pegawai;


class Data_Cuti_Bkd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_cuti = Tb_Cuti::all();
        return view('layout.bkd.datacutibkd', compact(['tb_cuti', 'user']));
    }

    public function data_cuti_bkd(Request $request) {
        $tb_cuti = Tb_Cuti::with('pegawai')->get();
        return $tb_cuti;
    }
}
