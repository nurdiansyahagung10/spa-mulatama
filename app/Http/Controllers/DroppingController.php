<?php

namespace App\Http\Controllers;

use File;
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
    public function create(string $id)
    {
        $anggota = Anggota::find($id);
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
            $filename= date('YmdHi').' foto_nasabah_mendatangani_spk '. $anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->id.'/'.$anggota->pdl->id.'/'.$anggota->id .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            $credentcial['foto_nasabah_mendatangani_spk']= $filename;
        }
        if($request->file('foto_nasabah_dan_spk')){
            $file= $request->file('foto_nasabah_dan_spk');
            $filename= date('YmdHi').' foto_nasabah_dan_spk '. $anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->id.'/'.$anggota->pdl->id.'/'.$anggota->id .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            $credentcial['foto_nasabah_dan_spk']= $filename;
        }
        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti_dropping '. $anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->id.'/'.$anggota->pdl->id.'/'.$anggota->id .'/'. date('Y-m-d') .'/dropping/bukti'), $filename);
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
        $dropping = Dropping::with('anggota.pdl.cabang')->find($id);
        return view('dashboard.pages.detaildropping')->with('dropping', $dropping );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::all();
        $dropping = dropping::with('anggota')->find($id);
        return view('dashboard.pages.editdropping')->with(['anggota' => $anggota,'dropping' => $dropping ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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


        $dropping = Dropping::with('anggota.pdl.cabang')->find($id);


        if($request->file('foto_nasabah_mendatangani_spk')){
            $file= $request->file('foto_nasabah_mendatangani_spk');
            $filename= date('YmdHi').' foto_nasabah_mendatangani_spk '. $dropping->anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_mendatangani_spk)){
                File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_mendatangani_spk);
            }
            $credentcial['foto_nasabah_mendatangani_spk']= $filename;
        }
        if($request->file('foto_nasabah_dan_spk')){
            $file= $request->file('foto_nasabah_dan_spk');
            $filename= date('YmdHi').' foto_nasabah_dan_spk '. $dropping->anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_dan_spk)){
                File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_dan_spk);
            }
            $credentcial['foto_nasabah_dan_spk']= $filename;
        }
        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti_dropping '. $dropping->anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. date('Y-m-d') .'/dropping/bukti'), $filename);
            if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->bukti)){
                File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->bukti);
            }

            $credentcial['bukti']= $filename;
        }
     

        $dropping->update($credentcial);


        return redirect()->back()->with("success", "berhasil edit dropping " . $dropping->anggota->nama);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $dropping = dropping::with('anggota.pdl.cabang')->find($id);
        $dropping->delete();

        if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_mendatangani_spk)){
            File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_mendatangani_spk);
        }
        
        if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_dan_spk)){
            File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_nasabah_dan_spk);
        }

        if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/bukti/'.$dropping->bukti)){
            File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/bukti/'.$dropping->bukti);
        }

        return redirect()->back()->with('success', "berhasil menghapus dropping ". $dropping->anggota->nama);
    }
}
