<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\pdl;
use Auth;

class PdlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $getusername = $user->nama;
        $cabang = null;
        if(isset($user->cabang)){
            $cabang = $user->cabang->nama;
        }
        return view("dashboard.pages.pdl")->with(['getusername' => $getusername, 'cabang' => $cabang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cabang = Cabang::all();
        return view('dashboard.pages.addpdl')->with('cabang' , $cabang);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentcial = $request->validate([
            "nama" => ["required",'unique:cabang,nama'],
            "cabang_id" => "required"
        ],
    [
        'nama.unique' => 'pdl ini sudah terdaftar',
    ]);
        Pdl::create($credentcial);

        return redirect()->back()->with("success","berhasil tambah pdl ". $credentcial['nama']);
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
        $cabang = Cabang::all();
        $pdl = Pdl::with('cabang')->find($id);
        return view('dashboard.pages.editpdl')->with(['cabang' => $cabang, 'pdl' => $pdl]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pdl = Pdl::find($id);

        if($pdl->nama != $request->nama){
            $credentcial = $request->validate([
                'nama' => ["required",'unique:pdl,nama'],
                "cabang_id" => "required"

            ],
            [
                'nama.unique' => 'pdl dengan nama '. $request->nama .' sudah terdaftar',
            ]);
        }else{
            $credentcial = $request->validate([
                'nama' => 'required',
                "cabang_id" => "required"
            ]);
        }

        Pdl::find($id)->update($credentcial);

        return redirect()->back()->with("success","berhasil edit pdl ".$pdl->nama);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pdl = Pdl::find($id);
        $pdl->delete();

        return redirect()->back()->with('success', "berhasil menghapus pdl ". $pdl->nama);
    }
}
