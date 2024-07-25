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
        Schema::create('permohonan_tte', function (Blueprint $table) {
            $table->id('id_permohonan_tte');
            $table->unsignedBigInteger('id_pemohon');
            $table->foreign('id_pemohon')->references('id_pemohon')->on('pemohon');
            $table->text('alamat_opd');
            $table->string('perihal');
            $table->text('dasar_pelaksanaan');
            $table->string('nomer_surat');
            $table->string('status_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_t_t_e_s');
    }
};
