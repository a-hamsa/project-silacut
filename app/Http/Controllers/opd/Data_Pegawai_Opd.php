<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Dinas;
use App\Models\Tb_Golongan;
use App\Models\Tb_Jabatan;
use App\Models\Tb_Jenis_Kelamin;
use App\Models\Tb_Pegawai;
use App\Models\Tb_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Data_Pegawai_Opd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('layout.opd.kelolapegawaiopd', compact(['user']));
    }
}
