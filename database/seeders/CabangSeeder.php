<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cabang;
use Illuminate\Support\Facades\File;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("storage/app/json/cabang.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Cabang::create([
                'id' => $obj->id,
                'nama' => $obj->nama,
                'admin_provisi' => $obj->admin_provisi,
                'simpanan' => $obj->simpanan,
                'created_at' => $obj->created_at,
                'updated_at' => $obj->updated_at,
            ]);    
        }
    }
}
