<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Dinas;
use Illuminate\Http\Request;

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
    
}
