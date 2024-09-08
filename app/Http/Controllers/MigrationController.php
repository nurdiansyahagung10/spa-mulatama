<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class MigrationController extends Controller
{
    public function freshMigrate()
    {
        try {
            // Menjalankan perintah migrate:fresh
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');

            // Jika sukses, kembali ke halaman dengan pesan sukses
             return response()->json('berhasil', 200);
        } catch (\Exception $e) {
            // Jika ada error, kembalikan dengan pesan error
             return response()->json($e->getMessage(), 200);
        }
    }
}
