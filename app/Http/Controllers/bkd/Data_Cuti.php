<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use Illuminate\Http\Request;

class Data_Cuti extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_cuti = Tb_Cuti::all();
        $tb_pegawai = Tb_Pegawai::all();
        return view('layout.bkd.datacuti', compact(['user','tb_cuti', 'tb_pegawai']));
    }
}
