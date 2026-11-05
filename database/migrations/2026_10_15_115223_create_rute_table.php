<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rute', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->foreignId('kategori_angkutan_id')->constrained('kategori_angkutan');
            $table->string('asal');
            $table->string('tujuan');
            $table->string('jam');
            $table->integer('tarif');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rute');
    }
};
