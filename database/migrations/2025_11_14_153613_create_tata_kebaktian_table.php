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
        Schema::create('tata_kebaktian', function (Blueprint $table) {
            $table->id();
            $table->enum('model', ['A', 'B', 'C', 'D', 'E']);
            $table->string('judul');
            $table->longText('isi');
            $table->string('file_pdf')->nullable();
            $table->string('banner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tata_kebaktian');
    }
};