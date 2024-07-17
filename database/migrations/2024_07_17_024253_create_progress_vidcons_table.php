<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressVidconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_vidcons', function (Blueprint $table) {
            $table->id('id_progress');
            $table->unsignedBigInteger('id_permohonan_vidcon')->constrained('permohonan_vidcon')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('id_permohonan_vidcon')->references('id_permohonan_vidcon')->on('permohonan_vidcon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress_vidcons');
    }
}
