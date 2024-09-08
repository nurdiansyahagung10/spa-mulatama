<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CabangSeeder;
use Database\Seeders\PdlSeeder;
use Database\Seeders\AnggotaSeeder;
use Database\Seeders\DroppingSeeder;
use Database\Seeders\StortingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            CabangSeeder::class,
            PdlSeeder::class,
            AnggotaSeeder::class,
            DroppingSeeder::class,
            StortingSeeder::class,
            // Tambahkan seeder lain jika diperlukan
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
