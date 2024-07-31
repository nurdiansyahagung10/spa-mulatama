<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Cabang;

class JsonController extends Controller
{
    public function user(request $request){
        $user  = User::where('email', '!=' ,'admin@gmail.com')->get();

        return response()->json($user, 200);

    }

    public function anggota (request $request){
        $anggota = Anggota::all();

        return response()->json($anggota, 200);
    }

    public function cabang(request $request){
        $cabang = Cabang::all();

        return response()->json($cabang, 200);
    }
}
