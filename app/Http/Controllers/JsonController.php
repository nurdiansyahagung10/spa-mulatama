<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Dropping;
use App\Models\Storting;
class JsonController extends Controller
{
    public function user(request $request){
        $user  = User::where('email', '!=' ,'admin@gmail.com')->with('cabang')->get();

        if ($user->isEmpty()) {
            return response()->json(['message' => 'No user found'], 404);
        }


        return response()->json($user, 200);

    }

    public function anggota (request $request){
        $anggota = Anggota::with(['pdl.cabang'])->get();

        if ($anggota->isEmpty()) {
            return response()->json(['message' => 'No angota found'], 404);
        }

        return response()->json($anggota, 200);
    }

    public function cabang(request $request){
        $cabang = Cabang::all();

        if ($cabang->isEmpty()) {
            return response()->json(['message' => 'No cabang found'], 404);
        }

        return response()->json($cabang, 200);
    }
    public function dropping(request $request){
        $dropping = Dropping::with('anggota.pdl.cabang')->get();


        if ($dropping->isEmpty()) {
            return response()->json(['message' => 'No dropping found'], 404);
        }

        return response()->json($dropping, 200);
    }
    public function storting(request $request){
        $storting = storting::with('anggota.pdl.cabang')->get();


        if ($storting->isEmpty()) {
            return response()->json(['message' => 'No storting found'], 404);
        }

        return response()->json($storting, 200);
    }
}
