<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Cabang;
use Auth;
use App\Models\pdl;
use App\Models\User;

class AnggotaController extends Controller
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
        return view("dashboard.pages.anggota.anggota")->with(['getusername' => $getusername, 'cabang' => $cabang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pdl = pdl::all();
        $cabang = Cabang::all();
        return view('dashboard.pages.anggota.addanggota')->with(['cabang' => $cabang, 'pdl' => $pdl]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentcial = $request->validate(
            [
                'jenis_anggota' => 'required',
                'nama' => 'required',
                'ktp' =>  ['unique:anggota,ktp', 'nullable'],
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


        $user = Auth::user();

        $anggota = Anggota::create(array_merge($credentcial, ['staff_id' => $user->id]));
        $pdl = pdl::with('cabang')->find($credentcial['pdl_id']);


        if ($request->file('foto_anggota')) {
            $file = $request->file('foto_anggota');
            $filename = date('YmdHi') . ' foto_anggota ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $pdl->cabang->id . '/' . $pdl->id . '/' . $anggota->id . '/' . date('Y-m-d') . '/pengajuan/ktp dan anggota'), $filename);
            $credentcial['foto_anggota'] = $filename;
        }
        if ($request->file('foto_ktp_anggota')) {
            $file = $request->file('foto_ktp_anggota');
            $filename = date('YmdHi') . ' foto_ktp_anggota ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $pdl->cabang->id . '/' . $pdl->id . '/' . $anggota->id . '/' . date('Y-m-d') . '/pengajuan/ktp dan anggota'), $filename);
            $credentcial['foto_ktp_anggota'] = $filename;
        }
        if ($request->file('foto_anggota_memegang_ktp')) {
            $file = $request->file('foto_anggota_memegang_ktp');
            $filename = date('YmdHi') . ' foto_anggota_memegang_ktp ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $pdl->cabang->id . '/' . $pdl->id . '/' . $anggota->id . '/' . date('Y-m-d') . '/pengajuan/ktp dan anggota'), $filename);
            $credentcial['foto_anggota_memegang_ktp'] = $filename;
        }
        if ($request->file('foto_usaha')) {
            $file = $request->file('foto_usaha');
            $filename = date('YmdHi') . ' foto_usaha ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $pdl->cabang->id . '/' . $pdl->id . '/' . $anggota->id . '/' . date('Y-m-d') . '/pengajuan/tempat usaha'), $filename);
            $credentcial['foto_usaha'] = $filename;
        }
        if ($request->file('foto_pengikat')) {
            $file = $request->file('foto_pengikat');
            $filename = date('YmdHi') . ' foto_pengikat ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $pdl->cabang->id . '/' . $pdl->id . '/' . $anggota->id . '/' . date('Y-m-d') . '/pengajuan/surat pengikat'), $filename);
            $credentcial['foto_pengikat'] = $filename;
        }

        Anggota::find($anggota->id)->update($credentcial);

        return redirect()->back()->with("success", "berhasil tambah anggota " . $credentcial['nama']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = Anggota::with('pdl.cabang')->find($id);
        return view('dashboard.pages.anggota.detailanggota')->with('anggota', $anggota);
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        $pdl = pdl::all();
        $anggota = Anggota::with('pdl.cabang')->find($id);
        return view('dashboard.pages.anggota.editanggota')->with(['anggota' => $anggota, 'pdl' => $pdl]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $anggota = Anggota::find($id);


        if ($anggota->ktp == $request->ktp && $anggota->kk == $request->kk && $anggota->nohp == $request->nohp) {
            $credentcial = $request->validate([
                'jenis_anggota' => 'required',
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

                    'jenis_anggota' => 'required',
                    'nama' => 'required',
                    'ktp' =>  ['unique:anggota,ktp', 'nullable'],
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

                    'jenis_anggota' => 'required',
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

                    'jenis_anggota' => 'required',
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

                    'jenis_anggota' => 'required',
                    'nama' => 'required',
                    'ktp' =>  ['unique:anggota,ktp', 'nullable'],
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


        if ($request->file('foto_anggota')) {
            $file = $request->file('foto_anggota');
            $filename = date('YmdHi') . ' foto_anggota ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota'), $filename);
            if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota)) {
                File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota);
            }
            $credentcial['foto_anggota'] = $filename;
        }
        if ($request->file('foto_ktp_anggota')) {
            $file = $request->file('foto_ktp_anggota');
            $filename = date('YmdHi') . ' foto_ktp_anggota ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota'), $filename);
            if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_ktp_anggota)) {
                File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_ktp_anggota);
            }

            $credentcial['foto_ktp_anggota'] = $filename;
        }
        if ($request->file('foto_anggota_memegang_ktp')) {
            $file = $request->file('foto_anggota_memegang_ktp');
            $filename = date('YmdHi') . ' foto_anggota_memegang_ktp ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota'), $filename);
            if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota_memegang_ktp)) {
                File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota_memegang_ktp);
            }

            $credentcial['foto_anggota_memegang_ktp'] = $filename;
        }
        if ($request->file('foto_usaha')) {
            $file = $request->file('foto_usaha');
            $filename = date('YmdHi') . ' foto_usaha ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/tempat usaha'), $filename);
            if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/tempat usaha/' . $anggota->foto_usaha)) {
                File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/tempat usaha/' . $anggota->foto_usaha);
            }

            $credentcial['foto_usaha'] = $filename;
        }
        if ($request->file('foto_pengikat')) {
            $file = $request->file('foto_pengikat');
            $filename = date('YmdHi') . ' foto_pengikat ' . $anggota->id . '.' . $file->extension();
            $file->move(public_path('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/surat pengikat'), $filename);
            if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/surat pengikat/' . $anggota->surat_pengikat)) {
                File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/surat pengikat/' . $anggota->surat_pengikat);
            }
            $credentcial['foto_pengikat'] = $filename;
        }

        Anggota::find($id)->update($credentcial);


        return redirect()->back()->with("success", "berhasil edit anggota " . $anggota['nama']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::with('pdl.cabang')->find($id);
        $anggota->delete();

        if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota)) {
            File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota);
        }
        if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_ktp_anggota)) {
            File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_ktp_anggota);
        }
        if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota_memegang_ktp)) {
            File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $anggota->foto_anggota_memegang_ktp);
        }
        if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/tempat usaha/' . $anggota->foto_usaha)) {
            File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/tempat usaha/' . $anggota->foto_usaha);
        }
        if (File::exists('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/surat pengikat/' . $anggota->surat_pengikat)) {
            File::delete('Image/' . $anggota->pdl->cabang->id . '/' . $anggota->pdl->id . '/' . $anggota->id . '/' . $anggota->created_at->format('Y-m-d') . '/pengajuan/surat pengikat/' . $anggota->surat_pengikat);
        }


        return redirect()->back()->with('success', "berhasil menghapus anggota " . $anggota['nama']);
    }
}
