<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Rekapan_Cuti extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('layout.bkd.rekapancuti', compact(['user']));
    }
}
