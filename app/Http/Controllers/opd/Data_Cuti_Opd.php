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
    
        $sisa_cuti = Tb_Cuti::where("NIP", $pegawai)->sum("Lama_Cuti");

        $tb_pegawai->sisa_cuti = $tb_pegawai->Kuota_Cuti - $sisa_cuti;
        $jabatan = Tb_Jabatan::select("Jabatan")->where("id_Jabatan", $tb_pegawai->Id_Jabatan)->first();
        $dinas = Tb_Dinas::select("Dinas")->where("Id_Dinas", $tb_pegawai->Id_Dinas)->first();
        $golongan = Tb_Golongan::select("Golongan")->where("id_Golongan", $tb_pegawai->Id_Golongan)->first();
        
        $tb_pegawai->Id_Jabatan = $jabatan->Jabatan;
        $tb_pegawai->Id_Golongan = $golongan->Golongan;
        $tb_pegawai->Id_Dinas = $dinas->Dinas;
        return response()->json($tb_pegawai);
    }

    public function store(Request $request){

        $pegawai = $request->input("pegawai");
        $tb_pegawai = Tb_Pegawai::where("NIP", $pegawai)->first();
        $sisa_cuti = Tb_Cuti::where("NIP", $pegawai)->sum("Lama_Cuti");
    
        $banyak_cuti = $tb_pegawai->Kuota_Cuti - $sisa_cuti;
    
        if ($request->input('lama_cuti') > $banyak_cuti) {
            return redirect()->back()->with('failed', 'Kuota cuti anda tidak mencukupi.');
        }

        $validatedData = $request->validate([
            'pegawai' => 'required',
            'jenis_cuti' => 'required',
            'dari' => 'required|date',
            'sampai' => 'required|date|after_or_equal:dari',
            'alasan_cuti' => 'required',
            'alamat_cuti' => 'required',
            'lama_cuti' => 'required|integer',
            'SKTerakhir' => 'nullable|file|mimes:pdf|max:4096',
            'Absen' => 'nullable|file|mimes:pdf|max:4096',
            'scan_cuti' => 'nullable|file|mimes:pdf|max:4096',
        ]);
        // Handle file uploads
        $tbCuti = new Tb_Cuti;
        if ($request->hasFile('SKTerakhir')) {
            $file = $request->file('SKTerakhir');
            $fileName = md5($file. time()) . '.pdf';
            $file->move('sk_terakhir', $fileName);
            $tbCuti->SK_Terakhir = $fileName;
        }
        if ($request->hasFile('Absen')) {
            $file = $request->file('Absen');
            $fileName = md5($file. time()) . '.pdf';
            $file->move('absen', $fileName);
            $tbCuti->Rekap_Absen = $fileName;
        }
        if ($request->hasFile('scan_cuti')) {
            $file = $request->file('scan_cuti');
            $fileName = md5($file. time()) . '.pdf';
            $file->move('scan_cuti', $fileName);
            $tbCuti->Permohonan_Cuti = $fileName;
        }

        $tbCuti->NIP = $validatedData['pegawai'];
        $tbCuti->Id_Jenis_Cuti = $validatedData['jenis_cuti'];
        $tbCuti->Tanggal_Mulai_Cuti = $validatedData['dari'];
        $tbCuti->Tanggal_Berakhir_Cuti = $validatedData['sampai'];
        $tbCuti->Tanggal_Pengajuan = now()->format('Y-m-d');
        $tbCuti->Alasan_Cuti = $validatedData['alasan_cuti'];
        $tbCuti->Alamat_Cuti = $validatedData['alamat_cuti'];
        $tbCuti->Lama_Cuti = $validatedData['lama_cuti'];
        // $tbCuti->No_Telp = $validatedData['no_telp'] ?? null;
    
        // Save the Tb_Cuti instance
        $tbCuti->save();
    
        // Redirect back or to a different page after storing the data
        return redirect()->back()->with('success', 'Data has been stored successfully.');
    }
    
    public function edit(Request $request){
        $tbCuti = Tb_Cuti::find($request->idCuti);
        $validatedData = $request->validate([
            'jenis_cuti' => 'required',
            'alasan_cuti' => 'required',
            'dari' => 'required|date',
            'sampai' => 'required|date|after_or_equal:dari',
            'lama_cuti' => 'required|integer',
            'alamat_cuti' => 'required',
            'SKTerakhir' => 'nullable|file|mimes:pdf|max:2048',
            'Absen' => 'nullable|file|mimes:pdf|max:2048',
            'scan_cuti' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        if ($request->hasFile('SKTerakhir')) {
            $file = $request->file('SKTerakhir');
            $fileName = md5($file. time()) . '.pdf';
            $file->move('sk_terakhir', $fileName);
            $tbCuti->SK_Terakhir = $fileName;
        }
        if ($request->hasFile('Absen')) {
            $file = $request->file('Absen');
            $fileName = md5($file. time()) . '.pdf';
            $file->move('absen', $fileName);
            $tbCuti->Rekap_Absen = $fileName;
        }
        if ($request->hasFile('scan_cuti')) {
            $file = $request->file('scan_cuti');
            $fileName = md5($file. time()) . '.pdf';
            $file->move('scan_cuti', $fileName);
            $tbCuti->Permohonan_Cuti = $fileName;
        }
        $tbCuti->Id_Jenis_Cuti = $validatedData['jenis_cuti'];
        $tbCuti->Alasan_Cuti = $validatedData['alasan_cuti'];
        $tbCuti->Tanggal_Mulai_Cuti = $validatedData['dari'];
        $tbCuti->Tanggal_Berakhir_Cuti = $validatedData['sampai'];
        $tbCuti->Lama_Cuti = $validatedData['lama_cuti'];
        $tbCuti->Alamat_Cuti = $validatedData['alamat_cuti'];
        $tbCuti->Verifikasi = null;
        
        // Save the Tb_Cuti instance
        $tbCuti->save();
    
        // Redirect back or to a different page after storing the data
        return redirect()->back()->with('success', 'Data has been stored successfully.');
    }

    public function destroy($id)
    {
        echo 'Halo';
        $tb_cuti = Tb_Cuti::find($id);
        $tb_cuti->delete();
        // return redirect()->route('kelolapegawaibkd.destroy')->with('success', 'Data berhasil dihapus');
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
