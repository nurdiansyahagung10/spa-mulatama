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
        Schema::create('storting', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_storting');
            $table->string('nominal_storting');
            $table->text('note')->nullable();
            $table->string('bukti')->nullable();
            $table->bigInteger("dropping_id")->unsigned()->index()->default('1');
            $table->foreign("dropping_id")->references("id")->on("dropping")->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists("storting");
    }
};
