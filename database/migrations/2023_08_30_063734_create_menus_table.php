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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nama_makanan_id')->constrained('nama_makanans');
            $table->foreignId('nama_minuman_id')->constrained('nama_minumans');
            $table->foreignId('kelola_menu_id')->constrained('kelola_menus');
            $table->string('nama');
            $table->integer('harga');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
