<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanVidconTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_vidcon', function (Blueprint $table) {
            $table->id('id_permohonan_vidcon');
            $table->unsignedBigInteger('id_pemohon');
            $table->string('judul_vidcon');
            $table->date('tanggal_vidcon');
            $table->time('waktu_vidcon');
            $table->string('lokasi_vidcon');
            $table->text('peserta_vidcon');
            $table->json('dukungan_vidcon');
            $table->enum('status_kegiatan', ['pending', 'proses', 'selesai'])->default('pending');
            $table->timestamps();

            $table->foreign('id_pemohon')->references('id_pemohon')->on('pemohon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_vidcon');
    }
}
