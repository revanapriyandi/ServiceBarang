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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 30);
            $table->string('msc_barang')->nullable();
            $table->foreignId('id_teknisi')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('id_barang')->references('id')->on('barangs')->cascadeOnDelete();
            $table->foreignId('id_kategori')->nullable()->references('id')->on('kategoris')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
