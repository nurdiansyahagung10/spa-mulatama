<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Dropping;
use App\Models\Storting;
use App\Models\pdl;
class JsonController extends Controller
{
    public function user(request $request){
        $user  = User::where('email', '!=' ,'admin@gmail.com')->with('cabang')->orderByDesc('created_at')->get();

        if ($user->isEmpty()) {
            return response()->json(['message' => 'No user found'], 404);
        }


        return response()->json($user, 200);

    }

    public function anggota (request $request){
        $anggota = Anggota::with(['pdl.cabang', 'dropping', 'storting'])->orderByDesc('created_at')->get();

        if ($anggota->isEmpty()) {
            return response()->json(['message' => 'No angota found'], 404);
        }

        return response()->json($anggota, 200);
    }

    public function cabang(request $request){
        $cabang = Cabang::orderByDesc('created_at')->get();;

        if ($cabang->isEmpty()) {
            return response()->json(['message' => 'No cabang found'], 404);
        }

        return response()->json($cabang, 200);
    }
    public function dropping(request $request){
        $dropping = Dropping::with('anggota.pdl.cabang')->orderByDesc('created_at')->get();


        if ($dropping->isEmpty()) {
            return response()->json(['message' => 'No dropping found'], 404);
        }

        return response()->json($dropping, 200);
    }
    public function storting(request $request){
        $storting = storting::with('anggota.pdl.cabang')->orderByDesc('created_at')->get();


        if ($storting->isEmpty()) {
            return response()->json(['message' => 'No storting found'], 404);
        }

        return response()->json($storting, 200);
    }
    public function pdl(request $request){
        $pdl = Pdl::with('cabang')->orderByDesc('created_at')->get();


        if ($pdl->isEmpty()) {
            return response()->json(['message' => 'No pdl found'], 404);
        }

        return response()->json($pdl, 200);
    }
}
