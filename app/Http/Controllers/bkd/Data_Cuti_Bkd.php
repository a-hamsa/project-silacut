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
        $tb_cuti = Tb_Cuti::with('jeniscuti')->get();
        return view('layout.bkd.datacutibkd', compact(['tb_cuti', 'user']));
    }

    public function getCutiData(Request $request)
    {

        $tb_cuti = Tb_Cuti::with('jeniscuti', 'pegawai')->get();
        return response()->json($tb_cuti);
    }


    public function data_cuti_bkd(Request $request)
    {
        $tb_cuti = Tb_Cuti::with('pegawai')->get();
        return $tb_cuti;
    }

    public function acceptCuti($id)
    {
        $cuti = Tb_Cuti::find($id);
        if (!$cuti) {
            return redirect()->back()->with('failed', 'Data cuti tidak ditemukan.');
        }
    
        $pegawai = Tb_Pegawai::where('NIP', $cuti->NIP)->first();
    
        if (!$pegawai) {
            return redirect()->back()->with('failed', 'Data Pegawai tidak ditemukan.');
        }

        if ($cuti && $pegawai) {
            // Calculate total leave taken by the employee
            $totalCutiTaken = Tb_Cuti::where('NIP', $cuti->NIP)
                ->where('Verifikasi', true) // Only count verified leave
                ->sum('Lama_Cuti');

            // Total leave after including this request
            $totalAfterThisRequest = $totalCutiTaken + $cuti->Lama_Cuti;

            // Check if the total leave exceeds the quota
            if ($totalAfterThisRequest <= $pegawai->Kuota_Cuti) {
                $cuti->Verifikasi = true;
                $cuti->Alasan_Penolakan = null;
                $cuti->save();

                return redirect()->back()->with('success', 'Cuti Telah Diterima.');
            } else {
                return redirect()->back()->with('failed', 'Pegawai tidak memiliki kuota cuti yang cukup.');
            }
        }

        return redirect()->back()->with('failed', 'Data Cuti tidak ditemukan.');
    }

    public function rejectCuti(Request $request, $id)
    {
        $cuti = Tb_Cuti::find($id);
        if (!$cuti) {
            return redirect()->back()->with('failed', 'Data cuti tidak ditemukan.');
        }

        if ($cuti) {
            // Set Lama_Cuti to 0 when rejected
            $cuti->Verifikasi = false;
            $cuti->Alasan_Penolakan = $request->input('Alasan_Penolakan');
            $cuti->Lama_Cuti = 0;
            $cuti->save();

            return redirect()->back()->with('success', 'Permohonan Cuti telah ditolak.');
        }

        return redirect()->back()->with('failed', 'Data Cuti tidak ditemukan');
    }
}
