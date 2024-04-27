<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use Illuminate\Http\Request;

class Rekapan_Cuti extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_cuti = Tb_Cuti::all();
        $tb_pegawai = Tb_Pegawai::all();
        return view('layout.bkd.rekapancuti', compact(['user','tb_cuti', 'tb_pegawai']));
    }
    public function getCuti(Request $request) {
        $nip = $request->input("nip");
        $tb_cuti = Tb_Cuti::where('NIP',$nip)->get()->toArray();
        $tb_pegawai = Tb_Pegawai::where('NIP',$nip)->first();
        for ($i=0; $i < count($tb_cuti); $i++) { 
            $tb_cuti[0]["Nama_Pegawai"] = $tb_pegawai->Nama_Pegawai;
        }
        if ($tb_cuti) {
            return response()->json($tb_cuti);
        } else {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
}
