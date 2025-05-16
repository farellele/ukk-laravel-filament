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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->enum('gender', ['Pria', 'Wanita']); // Mengubah 'L', 'P' menjadi 'Pria', 'Wanita'
            $table->text('alamat');
            $table->string('kontak')->unique();
            $table->string('email');
            $table->enum('status_pkl', ['Seleksi PKL', 'Sedang PKL', 'Selesai PKL']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
