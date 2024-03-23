<?php

namespace App\Http\Controllers\opd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Opd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('layout.opd.dashboardopd', compact(['user']));
    }
}
