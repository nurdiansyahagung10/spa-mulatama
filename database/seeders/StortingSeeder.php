<?php

namespace Database\Seeders;

use App\Models\Storting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class StortingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('json/storting.json');
        $data = json_decode($json);

        foreach ($data as $obj) {
            Storting::create(
                [
                    'id' => $obj->id,
                    'tanggal_storting' => $obj->tanggal_storting,
                    'nominal_storting' => $obj->nominal_storting,
                    'note' => $obj->note,
                    'bukti' => $obj->bukti,
                    'dropping_id' => $obj->dropping_id,
                    'created_at' => $obj->created_at,
                    'updated_at' => $obj->updated_at,
                ],
            );
        }
    }
}
