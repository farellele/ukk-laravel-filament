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
        Schema::create('pkls', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('siswa_id')->index();
            $table->unsignedBigInteger('industri_id')->index();
            $table->unsignedBigInteger('guru_id')->index();

            // Waktu mulai & selesai
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');

            $table->timestamps();

            // Constraints (foreign key relations)
            $table->foreign('siswa_id')->references('id')->on('data_siswas')->onDelete('cascade');
            $table->foreign('industri_id')->references('id')->on('industris')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('data_gurus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkls');
    }
};