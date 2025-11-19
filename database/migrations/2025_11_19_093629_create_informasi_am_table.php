<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasi_am', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['pengumuman', 'berita', 'kegiatan'])->default('pengumuman');
            $table->string('judul');
            $table->text('ringkasan')->nullable();
            $table->longText('isi');
            $table->string('thumbnail')->nullable();
            $table->string('banner')->nullable();
            $table->date('tanggal_kegiatan')->nullable();
            $table->string('lokasi')->nullable();
            $table->boolean('is_published')->default(true);
            $table->boolean('is_pinned')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi_am');
    }
};