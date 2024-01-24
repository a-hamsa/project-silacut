<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Pegawai;
use App\Models\Tb_User;
use Illuminate\Http\Request;

class Data_Pegawai extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_pegawai = Tb_Pegawai::all();
        return view('layout.opd.kelolapegawai', compact(['user','tb_pegawai']));
    }

    public function create()
    {
        $tb_pegawai = Tb_Pegawai::all();       

        return view('layout.opd.kelolapegawai',compact(['user','tb_pegawai']))->with([
            'user' => Auth::user(),
        ]);
    }

    
}
