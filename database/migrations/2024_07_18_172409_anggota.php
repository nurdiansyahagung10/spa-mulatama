<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("anggota", function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->date('tanggal_lahir')->nullable();
            $table->bigInteger("ktp")->unique("ktp")->nullable();
            $table->bigInteger("kk")->unique("kk")->nullable();
            $table->string('foto_anggota')->nullable();
            $table->string('foto_ktp_anggota')->nullable();
            $table->string('foto_anggota_memegang_ktp')->nullable();
            $table->string('usaha')->nullable();
            $table->string('foto_usaha')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->text('alamat')->nullable();
            $table->string('pengikat')->nullable();
            $table->string('foto_pengikat')->nullable();
            $table->string('nominal_pinjaman')->nullable();
            $table->string('jenis_anggota')->default('baru');
            $table->bigInteger('nohp')->nullable();
            $table->bigInteger("staff_id")->unsigned()->index()->nullable();
            $table->foreign("staff_id")->references("id")->on("users")->onDelete('cascade');
            $table->bigInteger("pdl_id")->unsigned()->index()->nullable();
            $table->foreign("pdl_id")->references("id")->on("pdl")->onDelete('cascade');
             $table->dateTime('created_at');
            $table->dateTime('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists("anggota");
    }
};
