<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Dropping;
use App\Models\Anggota;
use App\Models\Storting;
use App\Models\User;
use Auth;
class StortingController extends Controller
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
        return view("dashboard.pages.storting.storting")->with(['getusername' => $getusername, 'cabang' => $cabang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id, string $tanggal)
    {
        $dropping = Dropping::find($id);
        return view('dashboard.pages.storting.addstorting')->with(['dropping'=> $dropping,'tanggal_storting' => $tanggal]);

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
                "dropping_id" => 'required'

            ],
        );


        $dropping = Dropping::with('anggota')->find($credentcial['dropping_id']);

        $cekstorting = Storting::where('tanggal_storting', $credentcial['tanggal_storting'])->where('dropping_id', $credentcial['dropping_id'])->first();
        if($cekstorting){
            return redirect()->back()->withErrors('anggota '. $dropping->anggota->nama .' sudah storting di tanggal '. $credentcial['tanggal_storting']);
        }



        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti '. $dropping->anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$dropping->anggota->pdl->cabang->id.'/'.$dropping->anggota->pdl->id.'/'.$dropping->anggota->id .'/'. date('Y-m-d') .'/storting'), $filename);
            $credentcial['bukti']= $filename;
        }



        // $user = Auth::user();

        Storting::create($credentcial);


        return redirect()->back()->with("success", "berhasil tambah Storting " . $dropping->anggota->nama);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $storting = Storting::with('dropping.anggota.pdl.cabang')->find($id);
        return view('dashboard.pages.storting.detailstorting')->with('storting', $storting );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::with('dropping')->whereHas('dropping')->get();
        $storting = storting::with('dropping.anggota')->find($id);
        return view('dashboard.pages.storting.editstorting')->with(['anggota' => $anggota,'storting' => $storting ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $storting = Storting::with('dropping.anggota.pdl.cabang')->find($id);

        $credentcial = $request->validate(
            [
                'tanggal_storting' => 'required',
                'nominal_storting' => 'required',
                'note' => 'nullable',
                'bukti' => 'nullable',
                "dropping_id" => 'required'

            ],
        );


        $cekstorting = Storting::where('tanggal_storting', $credentcial['tanggal_storting'])->where('dropping_id', $credentcial['dropping_id'])->first();

        if($storting->tanggal_storting != $credentcial['tanggal_storting']){
            if($cekstorting){
                return redirect()->back()->withErrors('anggota '. $storting->dropping->anggota->nama .' sudah dropping di tanggal '. $credentcial['tanggal_storting']);
            }

        }

        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= date('YmdHi').' bukti '. $storting->dropping->anggota->id .'.'.$file->extension();
            $file-> move(public_path('Image/'.$storting->dropping->anggota->pdl->cabang->id.'/'.$storting->dropping->anggota->pdl->id.'/'.$storting->dropping->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting'), $filename);
            if(File::exists('Image/'.$storting->dropping->anggota->pdl->cabang->id.'/'.$storting->dropping->anggota->pdl->id.'/'.$storting->dropping->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti)){
                File::delete('Image/'.$storting->dropping->anggota->pdl->cabang->id.'/'.$storting->dropping->anggota->pdl->id.'/'.$storting->dropping->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti);
            }

            $credentcial['bukti']= $filename;
        }


        Storting::find($id)->update($credentcial);


        return redirect()->back()->with("success", "berhasil edit Storting " . $storting->dropping->anggota->nama);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storting = Storting::with('dropping.anggota.pdl.cabang')->find($id);
        $storting->delete();

        if(File::exists('Image/'.$storting->dropping->anggota->pdl->cabang->id.'/'.$storting->dropping->anggota->pdl->id.'/'.$storting->dropping->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti)){
            File::delete('Image/'.$storting->dropping->anggota->pdl->cabang->id.'/'.$storting->dropping->anggota->pdl->id.'/'.$storting->dropping->anggota->id .'/'. $storting->created_at->format('Y-m-d') .'/storting/'.$storting->bukti);
    }


        return redirect()->back()->with('success', "berhasil menghapus storting ". $storting->dropping->anggota->nama);

    }
}
