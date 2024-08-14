<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cabang;
use App\Models\pdl;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nama" => "admin",
            "email"=> "admin@gmail.com",
            "password"=> Hash::make("password"),
            "role" => 'admin'
        ]);

        Cabang::create(
            [
                "nama" => "testing_cabang"
            ]
            );
        pdl::create(
            [
                "nama" => "iyansyah",
                "cabang_id" => "1",
            ]
            );
    }
}
