<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanbulanancbm(){
        return view("dashboard.pages.laporanbulanancbm");
    }
    public function laporanbulananpbm(){
        return view("dashboard.pages.laporanbulananpbm");
    }
}
