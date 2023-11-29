<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_passwords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_superadmin');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_superadmin')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_passwords');
    }
};
