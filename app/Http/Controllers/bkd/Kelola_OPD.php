<?php

namespace App\Http\Controllers\bkd;
use DateTime;
use PDF;
use App\Http\Controllers\Controller;
use App\Models\Tb_Dinas;
use Illuminate\Http\Request;
use App\Models\Tb_Golongan;
use App\Models\Tb_Cuti;
use App\Models\Tb_Jabatan;
use App\Models\Tb_Jenis_Kelamin;
use App\Models\Tb_Pegawai;

class Kelola_OPD extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_dinas = Tb_Dinas::all();
        return view('layout.bkd.kelolaopd', compact(['user','tb_dinas']));
    }

    public function create()
    {
        $user = auth()->user();
        $tb_dinas = Tb_Dinas::all();   
        return view('layout.bkd.kelolaopd.create',compact(['user','tb_dinas']));
    }
    
    public function store(Request $request)
    {
    // Validasi input
        $request->validate([
        'txtdepartment' => 'required|unique:tb_dinas,Id_Dinas',
        ], [
        'txtdepartment.unique' => 'Dinas Telah Ada',
        ]);

        Tb_Dinas::create([
        //'Id_Dinas' => $request->input('txtname'),
        'Dinas' => $request->input('txtdepartment'),
        ]);
    return redirect('kelolaopd')->with('success', 'Data berhasil ditambahkan');
    }

    public function update($id, Request $request)
    {
        //$user = auth()->user();
        $tb_dinas = Tb_Dinas::find($id);
        $tb_dinas->update($request->except(['submit']));
        
        return redirect('kelolaopd')->with('success', 'Data berhasil di update');
    }

    public function edit($id)
{   
    $user = auth()->user();    
    $tb_dinas = Tb_Dinas::find($id);

    return view('layout.bkd.kelolaopd.edit', compact('user','tb_dinas'))
    ->with('success', 'Data berhasil di edit');
}

    public function destroy($id)
    {    
        $tb_dinas = Tb_Dinas::find($id);
        
        $tb_dinas->delete();
        // return redirect()->route('kelolapegawaibkd.destroy')->with('success', 'Data berhasil dihapus');
        return redirect('kelolaopd')->with('success', 'Data berhasil dihapus');
    }
    
    public function generatePdf(Request $request)
    {
        $nip = $request->input('pegawai');
        $tb_pegawai = Tb_Pegawai::where("NIP", $nip)->first();
        $sisa_cuti = Tb_Cuti::where("NIP", $nip)->count();

        $jenis_cuti = $request->input('jenis_cuti');
        $alasan_cuti = $request->input('alasan_cuti');
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');
        $alamat_cuti = $request->input('alamat_cuti');
        $no_telp = $request->input('no_telp');
        $cuti_besar = $request->input('cuti_besar');
        $cuti_sakit = $request->input('cuti_sakit');
        $cuti_melahirkan = $request->input('cuti_melahirkan');
        $cuti_alasan_penting = $request->input('cuti_alasan_penting');
        $cuti_luar_negara = $request->input('cuti_luar_negara');
    

        $dariTanggal = new DateTime($request->input('dari'));
        $sampaiTanggal = new DateTime($request->input('sampai'));
        
        $jumlah_hari = $dariTanggal->diff($sampaiTanggal)->days;        

        return view('layout.opd.file_cuti', compact('tb_pegawai', 'alamat_cuti', 'no_telp', 'sisa_cuti', 'jenis_cuti', 'alasan_cuti', 'dari', 'jumlah_hari', 'cuti_besar', 'cuti_sakit', 'cuti_melahirkan', 'cuti_alasan_penting', 'cuti_luar_negara'));
    }
}
