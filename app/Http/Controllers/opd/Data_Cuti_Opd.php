<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Cuti;
use App\Models\Tb_Pegawai;
use App\Models\Tb_Jabatan;
use App\Models\Tb_Dinas;
use App\Models\Tb_Jenis_Cuti;
use App\Models\Tb_Golongan;
use Illuminate\Http\Request;

class Data_Cuti_Opd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::where('Id_Dinas', $user->Id_Dinas)->get();
        $NIP = Tb_Pegawai::where('Id_Dinas', $user->Id_Dinas)->pluck('NIP');
        $tb_cuti = Tb_Cuti::whereIn('NIP', $NIP)->get();
        $tb_jenis_cuti = Tb_Jenis_Cuti::all();
        return view('layout.opd.datacutiopd', compact('user', 'tb_cuti', 'tb_pegawai', 'tb_jenis_cuti'));
    }

    public function getPegawai(Request $request){

        $pegawai = $request->input("nip");
        $tb_pegawai = Tb_Pegawai::where("NIP", $pegawai)->first();
        $tb_pegawai->NIP = (string) $tb_pegawai->NIP;
    
        $sisa_cuti = Tb_Cuti::where("NIP", $pegawai)->count();

        $tb_pegawai->sisa_cuti = 12 - $sisa_cuti;
        $jabatan = Tb_Jabatan::select("Jabatan")->where("id_Jabatan", $tb_pegawai->Id_Jabatan)->first();
        $dinas = Tb_Dinas::select("Dinas")->where("Id_Dinas", $tb_pegawai->Id_Dinas)->first();
        $golongan = Tb_Golongan::select("Golongan")->where("id_Golongan", $tb_pegawai->Id_Golongan)->first();
        
        $tb_pegawai->Id_Jabatan = $jabatan->Jabatan;
        $tb_pegawai->Id_Golongan = $golongan->Golongan;
        $tb_pegawai->Id_Dinas = $dinas->Dinas;
        return response()->json($tb_pegawai);
    }
    
}
