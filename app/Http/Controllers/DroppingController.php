<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Dropping;

class DroppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.dropping");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = Anggota::all();
        return view('dashboard.pages.adddropping')->with(['anggota'=> $anggota,]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $credentcial = $request->validate(
            [

                'tanggal_dropping' => 'required',
                'nominal_dropping' => 'required',
                'note' => 'nullable',
                'bukti' => 'nullable',
                "anggota_id" => 'required'
                
            ],
        );


        $anggota = Anggota::with('pdl.cabang')->find($credentcial['anggota_id']);


        if($request->file('foto_nasabah_mendatangani_spk')){
            $file= $request->file('foto_nasabah_mendatangani_spk');
            $filename= date('YmdHi').' foto_nasabah_mendatangani_spk '. $anggota->nama .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->nama.'/'.$anggota->pdl->nama.'/'.$anggota->nama .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            $credentcial['foto_nasabah_mendatangani_spk']= $filename;
        }
        if($request->file('foto_nasabah_dan_spk')){
            $file= $request->file('foto_nasabah_dan_spk');
            $filename= date('YmdHi').' foto_nasabah_dan_spk '. $anggota->nama .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->nama.'/'.$anggota->pdl->nama.'/'.$anggota->nama .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            $credentcial['foto_nasabah_dan_spk']= $filename;
        }
        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti '. $anggota->nama .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->nama.'/'.$anggota->pdl->nama.'/'.$anggota->nama .'/'. date('Y-m-d') .'/dropping/bukti'), $filename);
            $credentcial['bukti']= $filename;
        }
     


        // $user = Auth::user();

        Dropping::create($credentcial);


        return redirect()->back()->with("success", "berhasil tambah dropping " . $anggota['nama']);

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
