<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Dropping;
use Auth;

class DroppingController extends Controller
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
        return view("dashboard.pages.dropping.dropping")->with(['getusername' => $getusername, 'cabang' => $cabang]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $anggota = Anggota::find($id);
        return view('dashboard.pages.dropping.adddropping')->with(['anggota'=> $anggota,]);

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

        $cekdropping = Dropping::where('tanggal_dropping', $credentcial['tanggal_dropping'])->where('anggota_id', $credentcial['anggota_id'])->first();


        $anggota = Anggota::with('pdl.cabang')->find($credentcial['anggota_id']);

        if($cekdropping){
            return redirect()->back()->withErrors('anggota '. $anggota->nama .' sudah dropping di tanggal '. $credentcial['tanggal_dropping']);
        }



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
        if($request->file('foto_spk')){
            $file= $request->file('foto_spk');
            $filename= date('YmdHi').' foto_spk '. $anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->id.'/'.$anggota->pdl->id.'/'.$anggota->id .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            $credentcial['foto_spk']= $filename;
        }
        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti_dropping '. $anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->id.'/'.$anggota->pdl->id.'/'.$anggota->id .'/'. date('Y-m-d') .'/dropping/bukti'), $filename);
            $credentcial['bukti']= $filename;
        }



        // $user = Auth::user();

        Dropping::create($credentcial);


        return redirect()->back()->withInput()->with("success", "berhasil tambah dropping " . $anggota['nama']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dropping = Dropping::with('anggota.pdl.cabang')->find($id);
        return view('dashboard.pages.dropping.detaildropping')->with('dropping', $dropping );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $anggota = Anggota::all();
        $dropping = dropping::with('anggota')->find($id);
        return view('dashboard.pages.dropping.editdropping')->with(['anggota' => $anggota,'dropping' => $dropping ]);
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



        $cekdropping = Dropping::where('tanggal_dropping', $credentcial['tanggal_dropping'])->where('anggota_id', $credentcial['anggota_id'])->first();
        $dropping = Dropping::with('anggota.pdl.cabang')->find($id);

        if($dropping->tanggal_dropping != $credentcial['tanggal_dropping']){
            if($cekdropping){
                return redirect()->back()->withErrors('anggota '. $dropping->anggota->nama .' sudah dropping di tanggal '. $credentcial['tanggal_dropping']);
            }

        }



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
        if($request->file('foto_spk')){
            $file= $request->file('foto_spk');
            $filename= date('YmdHi').' foto_spk '. $dropping->anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. date('Y-m-d') .'/dropping/spk'), $filename);
            if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_spk)){
                File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_spk);
            }
            $credentcial['foto_spk']= $filename;
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
        if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_spk)){
            File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/spk/'.$dropping->foto_spk);
        }

        if(File::exists('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/bukti/'.$dropping->bukti)){
            File::delete('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. $dropping->created_at->format('Y-m-d') .'/dropping/bukti/'.$dropping->bukti);
        }

        return redirect()->back()->with('success', "berhasil menghapus dropping ". $dropping->anggota->nama);
    }
}
