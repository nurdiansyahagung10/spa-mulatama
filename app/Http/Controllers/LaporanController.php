<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanpdlmingguan(){
        return view("dashboard.pages.laporanpdlmingguan");
    }
}
