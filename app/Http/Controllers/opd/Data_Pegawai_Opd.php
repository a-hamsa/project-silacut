<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Dinas;
use App\Models\Tb_Golongan;
use App\Models\Tb_Jabatan;
use App\Models\Tb_Jenis_Kelamin;
use App\Models\Tb_Jenis_Cuti;
use App\Models\Tb_Pegawai;
use App\Models\Tb_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Data_Pegawai_Opd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::where('Id_Dinas', $user->Id_Dinas)->paginate(15);
        return view('layout.opd.kelolapegawai', compact(['user','tb_pegawai']));
    }

    public function create()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::all();
        $tb_dinas = Tb_Dinas::where('Id_Dinas', $user->Id_Dinas)->get();
        $tb_golongan = Tb_Golongan::all();
        $tb_jenis_kelamin = Tb_Jenis_Kelamin::all();
        $tb_jabatan = Tb_Jabatan::all();       
        return view('layout.opd.kelolapegawai.create',compact(['user','tb_pegawai','tb_dinas','tb_golongan','tb_jenis_kelamin','tb_jabatan']));
    }

    public function update($id, Request $request)
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::find($id);
        $tb_pegawai->update($request->except(['submit']));
        
        return redirect()->route('kelolapegawaiopd')->with('success', 'Data berhasil di update');
    }


    public function edit(Request $request)
    {   
        $id = $request->query('id');
        $user = auth()->user();    
        $tb_pegawai = Tb_Pegawai::findOrFail($id);
        $tb_dinas = Tb_Dinas::all();
        $tb_golongan = Tb_Golongan::all();
        $tb_jenis_kelamin = Tb_Jenis_Kelamin::all();
        $tb_jabatan = Tb_Jabatan::all();

        return view('layout.opd.kelolapegawai.edit', compact('user', 'tb_pegawai', 'tb_dinas','tb_golongan', 'tb_jenis_kelamin', 'tb_jabatan'))
        ->with('success', 'Data berhasil di edit');
    }

    public function store(Request $request)
    {
        $tb_pegawai = Tb_Pegawai::find($request->NIP);
        $user = auth()->user();
        $tb_pegawai->id_dinas = $user->Id_Dinas;
        $tb_pegawai->save();
        return redirect()->route('kelolapegawaiopd')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {    
        $tb_pegawai = Tb_Pegawai::find($id);
        
        $tb_pegawai->id_dinas = 2;
        $tb_pegawai->save();
        return redirect()->route('kelolapegawaiopd')->with('success', 'Data berhasil dihapus');
    }
}
