<?php

namespace App\Http\Controllers\bkd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Bkd extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('layout.bkd.dashboardbkd', compact(['user']));
    }
}
