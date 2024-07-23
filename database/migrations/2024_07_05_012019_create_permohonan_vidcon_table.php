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
            $table->string('alamat_opd');
            $table->text('dasar_pelaksanaan');
            $table->string('nomer_surat');
            $table->string('acara');
            $table->string('hari_tanggal');
            $table->string('waktu');
            $table->string('tempat');
            $table->text('peserta')->nullable();
            $table->text('bentuk_dukungan')->nullable();
            $table->string('nama_kepala');
            $table->string('nip_kepala');
            $table->string('pangkat_kepala');
            $table->timestamps();

            // Foreign key constraint
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
