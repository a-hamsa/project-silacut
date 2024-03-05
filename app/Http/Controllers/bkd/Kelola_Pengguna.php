<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Dinas;
use App\Models\Tb_User;
use Illuminate\Http\Request;

class Kelola_Pengguna extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_user = Tb_User::where('Id_Role', 2)->get();
        return view('layout.bkd.kelolapengguna', compact(['user','tb_user']));
    }

    public function create()
    {
        $user = auth()->user();
        $tb_user = Tb_User::all();
        $tb_dinas = Tb_Dinas::all();   
        return view('layout.bkd.kelolapengguna.create',compact(['user','tb_user','tb_dinas']));
    }

    public function update($id, Request $request)
    {
        $tb_user = Tb_User::find($id);
        
        // Pastikan bahwa nilai 'Id_Dinas' tidak berubah
        if ($request->input('Id_Dinas') != $tb_user->Id_Dinas) {
            return redirect()->back()->withErrors(['Id_Dinas' => 'Unit Kerja tidak dapat diubah.'])->withInput();
        }
    
        // Validasi input
        $request->validate([
            'txtusername' => 'required',
            'txtpassword' => 'nullable', // Boleh kosong saat update
            'txtrepeatpassword' => 'nullable|same:txtpassword', // Boleh kosong saat update
        ], [
            'txtusername.required' => 'Kolom Username harus diisi.',
            'txtrepeatpassword.same' => 'Kolom Ulangi Password harus sama dengan Password.',
        ]);
    
        // Jika validasi gagal, proses akan berhenti di sini dan pesan kesalahan akan otomatis ditampilkan kepada pengguna.
    
        // Jika validasi berhasil, lanjutkan dengan pembaruan data pengguna.
        $dataToUpdate = [
            'username' => $request->input('txtusername'),
        ];
    
        // Hanya tambahkan password baru jika ada input
        if ($request->filled('txtpassword')) {
            $dataToUpdate['password'] = bcrypt($request->input('txtpassword'));
        }
    
        // Update data pengguna
        $tb_user->update($dataToUpdate);
    
        return redirect('kelolapengguna')->with('success', 'Data berhasil diupdate');
    }
    

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'txtusername' => 'required',
        'txtpassword' => 'required',
        'txtrepeatpassword' => 'required|same:txtpassword',
        'txtdepartment' => 'exists:tb_dinas,Id_Dinas',
    ], [
        'txtusername.required' => 'Kolom Username harus diisi.',
        'txtpassword.required' => 'Kolom Password harus diisi.',
        'txtrepeatpassword.required' => 'Kolom Ulangi Password harus diisi.',
        'txtrepeatpassword.same' => 'Kolom Ulangi Password harus sama dengan Password.',
        'txtdepartment.exists' => 'Pilih Unit Kerja dari daftar yang tersedia.',
    ]);

    // Jika validasi gagal, proses akan berhenti di sini dan pesan kesalahan akan otomatis ditampilkan kepada pengguna.
    
    // Jika validasi berhasil, lanjutkan menyimpan data pengguna baru.
    $id_role = 2;

    Tb_User::create([
        'username' => $request->input('txtusername'),
        'password' => bcrypt($request->input('txtpassword')),
        'Id_Role' => $id_role,
        'Id_Dinas' => $request->input('txtdepartment'),
    ]);

    return redirect('kelolapengguna')->with('success', 'Data berhasil ditambahkan');
}


    public function edit($id)
    {   
        $user = auth()->user();    
        $tb_user = Tb_User::find($id);
        $tb_dinas = Tb_Dinas::all();

        return view('layout.bkd.kelolapengguna.edit', compact('user','tb_user','tb_dinas'))
        ->with('success', 'Data berhasil di edit');
    }

    public function destroy($id)
    {    
        $tb_user = Tb_User::find($id);
        
        $tb_user->delete();
        // return redirect()->route('kelolapegawaibkd.destroy')->with('success', 'Data berhasil dihapus');
        return redirect('kelolapengguna')->with('success', 'Data berhasil dihapus');
    }
}
