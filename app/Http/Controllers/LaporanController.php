<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LaporanController extends Controller
{
    public function laporanbulanancbm(){
        $user = Auth::user();
        $getusername = $user->nama;
        $cabang = null;
        if(isset($user->cabang)){
            $cabang = $user->cabang->nama;
        }
        return view("dashboard.pages.laporan.laporanbulanancbm")->with(['getusername' => $getusername, 'cabang' => $cabang]);
    }
    public function laporanbulananpbm(){
        $user = Auth::user();
        $getusername = $user->nama;
        $cabang = null;
        if(isset($user->cabang)){
            $cabang = $user->cabang->nama;
        }
        return view("dashboard.pages.laporan.laporanbulananpbm")->with(['getusername' => $getusername, 'cabang' => $cabang]);
    }
}
