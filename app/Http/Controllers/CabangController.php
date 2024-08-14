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

        return redirect()->back()->with("success","berhasil tambah cabang ". $credentcial['nama_cabang']);
        
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
        return view('dashboard.pages.editcabang')->with('cabang', $cabang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $cabang = Cabang::find($id);

        if($cabang->nama_cabang != $request->nama_cabang){
            $credentcial = $request->validate([
                'nama_cabang' => ["required",'unique:cabang,nama_cabang'],
            ],
            [
                'nama_cabang.unique' => 'cabang dengan nama '. $request->nama_cabang .' sudah terdaftar',                
            ]);    
        }else{
            $credentcial = $request->validate([
                'nama_cabang' => 'required',
            ]);    
        }

        Cabang::find($id)->update($credentcial);
        
        return redirect()->back()->with("success","berhasil edit cabang ".$cabang['nama_cabang']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabang = Cabang::find($id);
        $cabang->delete();

        return redirect()->back()->with('success', "berhasil menghapus cabang ". $cabang['nama_cabang']);

    }
}
