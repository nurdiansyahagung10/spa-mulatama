<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Storting;
class StortingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.storting");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $anggota = Anggota::find($id);
        return view('dashboard.pages.addstorting')->with(['anggota'=> $anggota,]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $credentcial = $request->validate(
            [
                'tanggal_storting' => 'required',
                'nominal_storting' => 'required',
                'note' => 'nullable',
                'bukti' => 'nullable',
                "anggota_id" => 'required'
                
            ],
        );


        $anggota = Anggota::with('pdl.cabang')->find($credentcial['anggota_id']);


        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti '. $anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$anggota->pdl->cabang->id.'/'.$anggota->pdl->id.'/'.$anggota->id .'/'. date('Y-m-d') .'/storting'), $filename);
            $credentcial['bukti']= $filename;
        }
     


        // $user = Auth::user();

        Storting::create($credentcial);


        return redirect()->back()->with("success", "berhasil tambah Storting " . $anggota['nama']);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $storting = Storting::with('anggota.pdl.cabang')->find($id);
        return view('dashboard.pages.detailstorting')->with('storting', $storting );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::all();
        $storting = storting::with('anggota')->find($id);
        return view('dashboard.pages.editstorting')->with(['anggota' => $anggota,'storting' => $storting ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $storting = Storting::with('anggota.pdl.cabang')->find($id);

        $credentcial = $request->validate(
            [
                'tanggal_storting' => 'required',
                'nominal_storting' => 'required',
                'note' => 'nullable',
                'bukti' => 'nullable',
                "anggota_id" => 'required'
                
            ],
        );




        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti '. $storting->anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$storting->anggota->pdl->cabang->id.'/'.$storting->anggota->pdl->id.'/'.$storting->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting'), $filename);
            if(File::exists('Image/'.$storting->anggota->pdl->cabang->id.'/'.$storting->anggota->pdl->id.'/'.$storting->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti)){
                File::delete('Image/'.$storting->anggota->pdl->cabang->id.'/'.$storting->anggota->pdl->id.'/'.$storting->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti);
            }
    
            $credentcial['bukti']= $filename;
        }
     


        // $user = Auth::user();

        Storting::find($id)->update($credentcial);


        return redirect()->back()->with("success", "berhasil edit Storting " . $storting->anggota->nama);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storting = Storting::with('anggota.pdl.cabang')->find($id);
        $storting->delete();

        if(File::exists('Image/'.$storting->anggota->pdl->cabang->id.'/'.$storting->anggota->pdl->id.'/'.$storting->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti)){
            File::delete('Image/'.$storting->anggota->pdl->cabang->id.'/'.$storting->anggota->pdl->id.'/'.$storting->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti);
    }
        

        return redirect()->back()->with('success', "berhasil menghapus storting ". $storting->anggota->nama);

    }
}
