<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use Illuminate\Http\Request;

class Dashboard_Opd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::where('Id_Dinas', $user->Id_Dinas)->count();
        $NIP = Tb_Pegawai::where('Id_Dinas', $user->Id_Dinas)->pluck('NIP');
        $tb_cuti = Tb_Cuti::whereIn('NIP', $NIP)->count();
        return view('layout.opd.dashboardopd', compact(['user', 'tb_cuti', 'tb_pegawai']));
    }
}
