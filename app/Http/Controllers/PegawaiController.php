<?php

namespace App\Http\Controllers;

use App\Models\Tb_Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('layout.opd.addpegawai')->with([
            'addpegawai' => Tb_Pegawai::all()
        ]);
    }
}
