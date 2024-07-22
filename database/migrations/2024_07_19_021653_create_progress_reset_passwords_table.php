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
        Schema::create('progress_reset_passwords', function (Blueprint $table) {
            $table->id('id_progress');
            $table->unsignedBigInteger('id_permohonan_reset_password')->constrained('permohonan_reset_password')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_reset_passwords');
    }
};
