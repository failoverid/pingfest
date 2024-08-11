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
        Schema::create('daftar_cps', function (Blueprint $table) {
            $table->string('nama_tim')->primary();
            $table->string('anggota_1');
            $table->string('anggota_2');
            $table->string('anggota_3');
            $table->foreign('anggota_1')->references('NIM')->on('user_mahasiswas')->onDelete('cascade');
            $table->foreign('anggota_2')->references('NIM')->on('user_mahasiswas')->onDelete('cascade');
            $table->foreign('anggota_3')->references('NIM')->on('user_mahasiswas')->onDelete('cascade');
            $table->string('bukti_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_cps');
    }
};
