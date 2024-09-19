<?php

namespace App\Http\Controllers;

use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function showStatus($NIP, $Id_Data_Cuti)
    {
        $cuti = Tb_Cuti::where('NIP', $NIP)
                    ->where('Id_Data_Cuti', $Id_Data_Cuti)
                    ->first();

        if (!$cuti) {
            return abort(404, 'Data not found');
        }

        $pegawai = Tb_Pegawai::where('NIP', $NIP)->first();

        if (!$pegawai) {
            return abort(404, 'Employee not found');
        }

        return view('status', compact('cuti', 'pegawai'));
    }
}