<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use App\Models\Tb_Cuti;
use Illuminate\Http\Request;

class Data_Cuti_Opd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tb_cuti = Tb_Cuti::all();
        return view('layout.opd.datacutiopd', compact(['user','tb_cuti']));
    }
}
