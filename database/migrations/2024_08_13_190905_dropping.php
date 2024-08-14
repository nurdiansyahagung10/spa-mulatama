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
        Schema::create('dropping', function (Blueprint $table) {
            $table->id();
            $table->string('foto_nasabah_mendatangani_spk');
            $table->string('foto_nasabah_dan_spk');
            $table->text('note');
            $table->string('bukti');
            $table->bigInteger("anggota_id")->unsigned()->index();
            $table->foreign("anggota_id")->references("id")->on("anggota")->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists("dropping");
    }
};
