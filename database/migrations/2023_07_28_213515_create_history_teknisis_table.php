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
        Schema::create('history_teknisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_teknisi')->references('id')->on('users')->cascadeOnDelete();
            $table->json('modul')->nullable();
            $table->integer('performance')->default(0);
            $table->integer('target')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_teknisis');
    }
};
