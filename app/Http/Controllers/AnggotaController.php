<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Cabang;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view("dashboard.pages.anggota")->with("anggota", $anggota);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cabang = Cabang::all();
        return view('dashboard.pages.addanggota')->with('cabang', $cabang);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentcial = $request->validate([
            'nama' => 'required',
            'ktp' => ['required','unique:anggota,ktp','numeric'],
            'kk' => ['unique:anggota,kk','numeric','nullable'],
            'alamat' => 'required',
            'pengikat' => 'required',
            'nohp' => ['required','unique:anggota,nohp','numeric'],
            'cabang_id' => ['required','numeric'],
        ],
        [
            'ktp.unique' => 'no ktp ini sudah terdaftar',
            'kk.unique' => 'no kk ini sudah terdaftar',    
            'nohp.unique' => 'no hp ini sudah terdaftar',    
        ]);    

        Anggota::create($credentcial);

        return redirect()->back()->with("success","berhasil tambah anggota ".$credentcial['nama']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
