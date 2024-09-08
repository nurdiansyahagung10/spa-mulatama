<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dropping;
class DroppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("storage/app/json/dropping.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Dropping::create(  [
                'id' => $obj->id,
                'tanggal_dropping' => $obj->tanggal_dropping,
                'nominal_dropping' => $obj->nominal_dropping,
                'foto_nasabah_mendatangani_spk' => $obj->foto_nasabah_mendatangani_spk,
                'foto_nasabah_dan_spk' => $obj->foto_nasabah_dan_spk,
                'foto_spk' => $obj->foto_spk,
                'note' => $obj->note,
                'bukti' => $obj->bukti,
                'anggota_id' => $obj->anggota_id,
                'created_at' => $obj->created_at,
                'updated_at' => $obj->updated_at,
            ]);    
        }
    }
}
