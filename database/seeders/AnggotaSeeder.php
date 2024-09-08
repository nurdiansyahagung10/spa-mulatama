<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;
use Illuminate\Support\Facades\File;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("json/anggota.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Anggota::create([
                'id' => $obj->id,
                'nama' => $obj->nama,
                'tanggal_lahir' => $obj->tanggal_lahir,
                'ktp' => $obj->ktp,
                'kk' => $obj->kk,
                'foto_anggota' => $obj->foto_anggota,
                'foto_ktp_anggota' => $obj->foto_ktp_anggota,
                'foto_anggota_memegang_ktp' => $obj->foto_anggota_memegang_ktp,
                'usaha' => $obj->usaha,
                'foto_usaha' => $obj->foto_usaha,
                'alamat_usaha' => $obj->alamat_usaha,
                'alamat' => $obj->alamat,
                'pengikat' => $obj->pengikat,
                'foto_pengikat' => $obj->foto_pengikat,
                'jenis_anggota' => $obj->jenis_anggota,
                'nohp' => $obj->nohp,
                'staff_id' => $obj->staff_id,
                'pdl_id' => $obj->pdl_id,
                'created_at' => $obj->created_at,
                'updated_at' => $obj->updated_at,
            ]);    
        }
    }
}
