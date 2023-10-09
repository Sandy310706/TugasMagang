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
        Schema::create('kelola_pesans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keranjang_id');
            $table->string('token'); 
            $table->foreign('keranjang_id')->references('id')->on('keranjangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_pesans');
    }
};
