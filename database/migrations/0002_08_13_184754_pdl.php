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
        Schema::create('pdl', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->bigInteger("cabang_id")->unsigned()->index();
            $table->foreign("cabang_id")->references("id")->on("cabang")->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists("pdl");
    }
};
