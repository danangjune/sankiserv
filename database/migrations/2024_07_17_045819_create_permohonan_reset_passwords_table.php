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
        Schema::create('permohonan_reset_passwords', function (Blueprint $table) {
            $table->id('id_permohonan_reset_password');
            $table->unsignedBigInteger('id_pemohon');
            $table->string('email_reset');
            $table->string('alasan_reset');
            $table->string('status_reset');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_pemohon')->references('id_pemohon')->on('pemohon')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_reset_password');
    }

};