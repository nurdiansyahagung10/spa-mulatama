<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Cabang;
use Auth;
use App\Models\pdl;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.anggota");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pdl = pdl::all();
        $cabang = Cabang::all();
        return view('dashboard.pages.addanggota')->with(['cabang'=> $cabang,'pdl' => $pdl]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentcial = $request->validate(
            [
                'nama' => 'required',
                'ktp' =>  ['unique:anggota,ktp','nullable'],
                'kk' => ['unique:anggota,kk', 'nullable'],
                'nohp' =>  ['unique:anggota,nohp', 'nullable'],
                'pdl_id' => 'required',
                'tanggal_lahir' => 'nullable',
                'usaha' => 'nullable',
                'foto_usaha' => 'nullable',
                'alamat_usaha' => 'nullable',
                'alamat' => 'nullable',
                'pengikat' => 'nullable',
                'foto_pengikat' => 'nullable',
            ],
            [
                'ktp.unique' => 'no ktp ini sudah terdaftar',
                'kk.unique' => 'no kk ini sudah terdaftar',
                'nohp.unique' => 'no hp ini sudah terdaftar',
            ]
        );


        $pdl = pdl::with('cabang')->find($credentcial['pdl_id']);



        if($request->file('foto_anggota')){
            $file= $request->file('foto_anggota');
            $filename= date('YmdHi').' foto_anggota '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/ktp dan anggota'), $filename);
            $credentcial['foto_anggota']= $filename;
        }
        if($request->file('foto_ktp_anggota')){
            $file= $request->file('foto_ktp_anggota');
            $filename= date('YmdHi').' foto_ktp_anggota '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/ktp dan anggota'), $filename);
            $credentcial['foto_ktp_anggota']= $filename;
        }
        if($request->file('foto_anggota_memegang_ktp')){
            $file= $request->file('foto_anggota_memegang_ktp');
            $filename= date('YmdHi').' foto_anggota_memegang_ktp '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/ktp dan anggota'), $filename);
            $credentcial['foto_anggota_memegang_ktp']= $filename;
        }
        if($request->file('foto_usaha')){
            $file= $request->file('foto_usaha');
            $filename= date('YmdHi').' foto_usaha '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/tempat usaha'), $filename);
            $credentcial['foto_usaha']= $filename;
        }
        if($request->file('foto_pengikat')){
            $file= $request->file('foto_pengikat');
            $filename= date('YmdHi').' foto_pengikat '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/surat pengikat'), $filename);
            $credentcial['foto_pengikat']= $filename;
        }


        $user = Auth::user();

        Anggota::create(array_merge($credentcial, ['staff_id' => $user->id ]));


        return redirect()->back()->with("success", "berhasil tambah anggota " . $credentcial['nama']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = Anggota::with('pdl.cabang')->find($id);
        return view('dashboard.pages.detailanggota')->with('anggota', $anggota );
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        $pdl = pdl::all();
        $anggota = Anggota::with('pdl.cabang')->find($id);
        return view('dashboard.pages.editanggota')->with(['anggota' => $anggota,'pdl' => $pdl ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $anggota = Anggota::find($id);


        if ($anggota->ktp == $request->ktp && $anggota->kk == $request->kk && $anggota->nohp == $request->nohp) {
            $credentcial = $request->validate([
                'nama' => 'required',
                'ktp' =>  'nullable',
                'kk' =>  'nullable',
                'nohp' =>   'nullable',
                'pdl_id' => 'required',
                'tanggal_lahir' => 'nullable',
                'usaha' => 'nullable',
                'foto_usaha' => 'nullable',
                'alamat_usaha' => 'nullable',
                'alamat' => 'nullable',
                'pengikat' => 'nullable',
                'foto_pengikat' => 'nullable',
            ]);

        } else if ($anggota->ktp != $request->ktp) {
            $credentcial = $request->validate(
                [
                    'nama' => 'required',
                    'ktp' =>  ['unique:anggota,ktp','nullable'],
                    'kk' =>  'nullable',
                    'nohp' =>   'nullable',
                    'pdl_id' => 'required',
                    'tanggal_lahir' => 'nullable',
                        'usaha' => 'nullable',
                    'foto_usaha' => 'nullable',
                    'alamat_usaha' => 'nullable',
                    'alamat' => 'nullable',
                    'pengikat' => 'nullable',
                    'foto_pengikat' => 'nullable',

                ],
                [
                    'ktp.unique' => 'no ktp ' . $request->ktp . ' sudah terdaftar',
                ]
            );
        } else if ($anggota->kk != $request->kk) {
            $credentcial = $request->validate(
                [
                    'nama' => 'required',
                    'ktp' =>   'nullable',
                    'kk' => ['unique:anggota,kk', 'nullable'],
                    'nohp' =>  'nullable',
                    'pdl_id' => 'required',
                    'tanggal_lahir' => 'nullable',
                        'usaha' => 'nullable',
                    'foto_usaha' => 'nullable',
                    'alamat_usaha' => 'nullable',
                    'alamat' => 'nullable',
                    'pengikat' => 'nullable',
                    'foto_pengikat' => 'nullable',

                ],
                [
                    'kk.unique' => 'no kk ' . $request->kk . ' sudah terdaftar',
                ]
            );       
        } else if ($anggota->nohp != $request->nohp) {
            $credentcial = $request->validate(
                [
                    'nama' => 'required',
                    'ktp' =>  'nullable',
                    'kk' => 'nullable',
                    'nohp' =>  ['unique:anggota,nohp', 'nullable'],
                    'pdl_id' => 'required',
                    'tanggal_lahir' => 'nullable',
                        'usaha' => 'nullable',
                    'foto_usaha' => 'nullable',
                    'alamat_usaha' => 'nullable',
                    'alamat' => 'nullable',
                    'pengikat' => 'nullable',
                    'foto_pengikat' => 'nullable',

                ],
                [
                    'nohp.unique' => 'no hp ' . $request->nohp . ' sudah terdaftar',
                ]
            );        
        } else {
            $credentcial = $request->validate(
                [
                    'nama' => 'required',
                    'ktp' =>  ['unique:anggota,ktp','nullable'],
                    'kk' => ['unique:anggota,kk', 'nullable'],
                    'nohp' =>  ['unique:anggota,nohp', 'nullable'],
                    'pdl_id' => 'required',
                    'tanggal_lahir' => 'nullable',
                        'usaha' => 'nullable',
                    'foto_usaha' => 'nullable',
                    'alamat_usaha' => 'nullable',
                    'alamat' => 'nullable',
                    'pengikat' => 'nullable',
                    'foto_pengikat' => 'nullable',

                ],
                [
                    'ktp.unique' => 'no ktp ' . $request->ktp . ' sudah terdaftar',
                    'kk.unique' => 'no kk ' . $request->kk . ' sudah terdaftar',
                    'nohp.unique' => 'no hp ' . $request->nohp . ' sudah terdaftar',
                ]
            );
        }

        $pdl = pdl::find($credentcial['pdl_id']);
        $cabang = Cabang::find($pdl['cabang_id']);



        if($request->file('foto_anggota')){
            $file= $request->file('foto_anggota');
            $filename= date('YmdHi').' foto_anggota '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/ktp dan anggota'), $filename);
            $credentcial['foto_anggota']= $filename;
        }
        if($request->file('foto_ktp_anggota')){
            $file= $request->file('foto_ktp_anggota');
            $filename= date('YmdHi').' foto_ktp_anggota '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/ktp dan anggota'), $filename);
            $credentcial['foto_ktp_anggota']= $filename;
        }
        if($request->file('foto_anggota_memegang_ktp')){
            $file= $request->file('foto_anggota_memegang_ktp');
            $filename= date('YmdHi').' foto_anggota_memegang_ktp '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/ktp dan anggota'), $filename);
            $credentcial['foto_anggota_memegang_ktp']= $filename;
        }
        if($request->file('foto_usaha')){
            $file= $request->file('foto_usaha');
            $filename= date('YmdHi').' foto_usaha '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/tempat usaha'), $filename);
            $credentcial['foto_usaha']= $filename;
        }
        if($request->file('foto_pengikat')){
            $file= $request->file('foto_pengikat');
            $filename= date('YmdHi').' foto_pengikat '. $credentcial['nama'].'.'.$file->extension();
            $file-> move(public_path('Image/'.$pdl->cabang->nama.'/'.$pdl['nama'].'/'.$credentcial['nama'].'/'. date('Y-m-d') .'/surat pengikat'), $filename);
            $credentcial['foto_pengikat']= $filename;
        }

        Anggota::find($id)->update(array_merge($credentcial, ['staff_id', ]));


        return redirect()->back()->with("success", "berhasil edit anggota " . $anggota['nama']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect()->back()->with('success', "berhasil menghapus anggota ". $anggota['nama']);

    }
}
