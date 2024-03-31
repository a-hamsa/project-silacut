<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use App\Models\Tb_Jabatan;
use App\Models\Tb_Golongan;
use Illuminate\Http\Request;

class Data_Cuti_Opd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_cuti = Tb_Cuti::all();
        $tb_pegawai = Tb_Pegawai::all();
        return view('layout.opd.datacutiopd', compact(['user','tb_cuti', 'tb_pegawai']));
    }
    public function getPegawai(Request $request){
        $pegawai = $request->input("pegawai");
        $tb_pegawai = Tb_Pegawai::where("Nama_Pegawai", $pegawai)->first();
        $tb_pegawai->NIP = (string) $tb_pegawai->NIP;
        $jabatan = Tb_Jabatan::select("Jabatan")->where("id_Jabatan", $tb_pegawai->Id_Jabatan)->first();
        $golongan = Tb_Golongan::select("Golongan")->where("id_Golongan", $tb_pegawai->Id_Golongan)->first();
        $tb_pegawai->Id_Jabatan = $jabatan->Jabatan;
        $tb_pegawai->Id_Golongan = $golongan->Golongan;
        return response()->json($tb_pegawai);
    }    
}
