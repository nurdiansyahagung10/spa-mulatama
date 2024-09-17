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
        return view("dashboard.pages.cabang.cabang")->with("cabang", $cabang);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.cabang.addcabang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $credentcial = $request->validate([
            "nama" => ["required",'unique:cabang,nama'],
            "admin_provisi" => "required",
            "simpanan" => "required",
        ],
    [
        'nama.unique' => 'cabang ini sudah terdaftar',

    ]);
        Cabang::create($credentcial);

        return redirect()->back()->with("success","berhasil tambah cabang ". $credentcial['nama']);

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
        $cabang = Cabang::find($id);
        return view('dashboard.pages.cabang.editcabang')->with('cabang', $cabang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $cabang = Cabang::find($id);

        if($cabang->nama != $request->nama){
            $credentcial = $request->validate([
                "nama" => ["required",'unique:cabang,nama'],
                "admin_provisi" => "required",
                "simpanan" => "required",
            ],
        [
            'nama.unique' => 'cabang ini sudah terdaftar',

        ]);
            }else{
            $credentcial = $request->validate([
                'nama' => 'required',
                "admin_provisi" => "required",
                "simpanan" => "required",

            ]);
        }


        Cabang::find($id)->update($credentcial);

        return redirect()->back()->with("success","berhasil edit cabang ".$cabang->nama);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabang = Cabang::find($id);
        $cabang->delete();

        return redirect()->back()->with('success', "berhasil menghapus cabang ". $cabang->nama);

    }
}
