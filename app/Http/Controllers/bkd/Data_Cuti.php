<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Data_Cuti extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('layout.bkd.datacuti', compact(['user']));
    }
}
