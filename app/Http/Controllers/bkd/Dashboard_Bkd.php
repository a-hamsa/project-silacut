<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use Illuminate\Http\Request;

class Dashboard_Bkd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::count();
        $tb_cuti = Tb_Cuti::count();
        return view('layout.bkd.dashboardbkd', compact(['user', 'tb_cuti', 'tb_pegawai']));
    }
}
