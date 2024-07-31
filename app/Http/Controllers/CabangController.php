<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;

class CabangController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabang = cabang::all();
        return view("dashboard.pages.cabang")->with("cabang", $cabang);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.addcabang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $credentcial = $request->validate([
            "nama_cabang" => ["required",'unique:cabang,nama_cabang']
        ],
    [
        'nama_cabang.unique' => 'cabang ini sudah terdaftar',

    ]);
        Cabang::create($credentcial);

        return redirect()->back()->with("success","berhasil tambah cabang");
        
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
