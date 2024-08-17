<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Dinas;
use App\Models\Tb_Golongan;
use App\Models\Tb_Jabatan;
use App\Models\Tb_Jenis_Kelamin;
use App\Models\Tb_Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Data_Pegawai extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::all();
        return view('layout.bkd.kelolapegawaibkd', compact(['user','tb_pegawai']));
    }

    public function create()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::all();
        $tb_dinas = Tb_Dinas::all();
        $tb_golongan = Tb_Golongan::all();
        $tb_jenis_kelamin = Tb_Jenis_Kelamin::all();
        $tb_jabatan = Tb_Jabatan::all();
        return view('layout.bkd.kelolapegawaibkd.create',compact(['user','tb_pegawai','tb_dinas','tb_golongan','tb_jenis_kelamin','tb_jabatan']));
    }
    
    public function update($id, Request $request)
    {
        $tb_pegawai = Tb_Pegawai::find($id);
        $tb_pegawai->update($request->except(['submit']));
        
        return redirect('kelolapegawaibkd')->with('success', 'Data berhasil di update');
    }


    public function edit($id)
    {   
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::find($id);
        $tb_dinas = Tb_Dinas::all();
        $tb_golongan = Tb_Golongan::all();
        $tb_jenis_kelamin = Tb_Jenis_Kelamin::all();
        $tb_jabatan = Tb_Jabatan::all();

        return view('layout.bkd.kelolapegawaibkd.edit', compact('user', 'tb_pegawai', 'tb_dinas','tb_golongan', 'tb_jenis_kelamin', 'tb_jabatan'))
        ->with('success', 'Data berhasil di edit');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'txtname' => 'required',
            'txtid' => 'required|unique:tb_pegawai,NIP|min:15|max:17',
            'txtposition' => 'required|exists:tb_jabatan,Id_Jabatan',
            'txtbirthplace' => 'required',
            'txtdateofbirth' => 'required|date',
            'txtgender' => 'required|exists:tb_jenis_kelamin,Id_Jenis_Kelamin',
            'txtdepartment' => 'required|exists:tb_dinas,Id_Dinas',
            'txtstartingdate' => 'required|date',
            'txtaddress' => 'required',
            'txtKuota' => 'required',
            'txtgroup' => 'required|exists:tb_golongan,Id_Golongan',
            'txtphone' => 'required',
        ], [
            'txtname.required' => 'Nama wajib di isi',
            'txtid.required' => 'NIP wajib di isi',
            'txtid.unique' => 'NIP telah digunakan',
            'txtposition.required' => 'Anda harus memilih jabatan',
            'txtposition.in' => 'Pilihan jabatan tidak valid',
            'txtposition.exists' => 'Pilihan jabatan tidak valid',
            'txtbirthplace.required' => 'Tempat lahir wajib di isi',
            'txtdateofbirth.required' => 'Tanggal lahir wajib di isi',
            'txtdateofbirth.date' => 'Format tanggal lahir tidak valid',
            'txtgender.required' => 'Anda harus memilih jenis kelamin',
            'txtgender.exists' => 'Pilihan jenis kelamin tidak valid',
            'txtdepartment.required' => 'Anda harus memilih dinas',
            'txtdepartment.exists' => 'Pilihan dinas tidak valid',
            'txtstartingdate.required' => 'Tanggal mulai wajib di isi',
            'txtstartingdate.date' => 'Format tanggal mulai tidak valid',
            'txtaddress.required' => 'Alamat wajib di isi',
            'txtKuota.required' => 'Mohon isi banyak kuota cuti',
            'txtgroup.required' => 'Anda harus memilih golongan',
            'txtgroup.exists' => 'Pilihan golongan tidak valid',
            'txtphone.required' => 'Nomor telepon wajib di isi',
        ]);

        Tb_Pegawai::create([
            'Nama_Pegawai' => $request->input('txtname'),
            'NIP' => $request->input('txtid'),
            'Id_Jabatan' => $request->input('txtposition'),
            'Tempat_Lahir' => $request->input('txtbirthplace'),
            'Tanggal_Lahir' => $request->input('txtdateofbirth'),
            'Id_Jenis_Kelamin' => $request->input('txtgender'),
            'Id_Dinas' => $request->input('txtdepartment'),
            'Tanggal_Mulai' => $request->input('txtstartingdate'),
            'Alamat_Pegawai' => $request->input('txtaddress'),
            'Kuota_Cuti' => $request->input('Kuota_Cuti'),
            'Id_Golongan' => $request->input('txtgroup'),
            'Telepon_Pegawai' => $request->input('txtphone'),
        ]);
        return redirect('kelolapegawaibkd')->with('success', 'Data berhasil ditambahkan');
    }



    public function destroy($id)
    {    
        $tb_pegawai = Tb_Pegawai::find($id);
        
        $tb_pegawai->delete();
        // return redirect()->route('kelolapegawaibkd.destroy')->with('success', 'Data berhasil dihapus');
        return redirect('kelolapegawaibkd')->with('success', 'Data berhasil dihapus');
    }
}
