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

            // Jika sukses, kembali ke halaman dengan pesan sukses
            return back()->with('success', 'Migration fresh berhasil dijalankan.');
        } catch (\Exception $e) {
            // Jika ada error, kembalikan dengan pesan error
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
