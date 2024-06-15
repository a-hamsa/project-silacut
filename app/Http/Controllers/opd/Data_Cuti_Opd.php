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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pegawai' => 'required',
            'jenis_cuti' => 'required',
            'dari' => 'required|date',
            'sampai' => 'required|date',
            'alasan_cuti' => 'required',
            'alamat_cuti' => 'required',
        ]);

        // Handle file uploads
        // $skTerakhirPath = $request->file('SKTerakhir')->store('sk_terakhir', 'public');
        // $absenPath = $request->file('Absen')->store('absen', 'public');
        // $scanCutiPath = $request->file('scan_cuti')->store('scan_cuti', 'public');

        // Create a new Tb_Cuti instance
        $tbCuti = new Tb_Cuti;
        $tbCuti->NIP = $validatedData['pegawai'];
        $tbCuti->Id_Jenis_Cuti = $validatedData['jenis_cuti'];
        $tbCuti->Tanggal_Mulai_Cuti = $validatedData['dari'];
        $tbCuti->Tanggal_Berakhir_Cuti = $validatedData['sampai'];
        $tbCuti->Tanggal_Pengajuan = now()->format('Y-m-d');
        $tbCuti->Alasan_Cuti = $validatedData['alasan_cuti'];
        $tbCuti->Alamat_Cuti = $validatedData['alamat_cuti'];
        // Set file paths
        // $tbCuti->sk_terakhir_path = $skTerakhirPath;
        // $tbCuti->absen_path = $absenPath;
        // $tbCuti->scan_cuti_path = $scanCutiPath;
        
        // Save the Tb_Cuti instance
        $tbCuti->save();

        // Redirect back or to a different page after storing the data
        return redirect()->back()->with('success', 'Data has been stored successfully.');
    }
}
