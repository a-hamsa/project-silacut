<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index() {
        $user = auth()->user();

        if ($user->Id_Role == 1) {
            $tb_pegawai = Tb_Pegawai::count();
            $tb_cuti = Tb_Cuti::count();
            return view('layout.bkd.dashboardbkd', compact(['user', 'tb_cuti', 'tb_pegawai']));
        } elseif ($user->Id_Role == 2) {
            $tb_pegawai = Tb_Pegawai::where('Id_Dinas', $user->Id_Dinas)->count();
            $NIP = Tb_Pegawai::where('Id_Dinas', $user->Id_Dinas)->pluck('NIP');
            $tb_cuti = Tb_Cuti::whereIn('NIP', $NIP)->count();
            return view('layout.opd.dashboardopd', compact(['user', 'tb_cuti', 'tb_pegawai']));
        }
    }
}
