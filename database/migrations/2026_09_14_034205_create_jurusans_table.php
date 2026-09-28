<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->json('deskripsi')->nullable();
            $table->json('kompetensi')->nullable();
            $table->json('prospek')->nullable();
            $table->json('fasilitas')->nullable();
            $table->json('mitra')->nullable();
            $table->string('logo')->nullable();
            $table->string('gambar_sampul')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};