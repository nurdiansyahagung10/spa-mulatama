<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pdl;
use Illuminate\Support\Facades\File;
class PdlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("storage/app/json/pdl.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            pdl::create(  [
                'id' => $obj->id,
                'nama' => $obj->nama,
                'cabang_id' => $obj->cabang_id,
                'created_at' => $obj->created_at,
                'updated_at' => $obj->updated_at,
            ]);    
        }
    }
}
