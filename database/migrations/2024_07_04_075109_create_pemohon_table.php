<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemohonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->id('id_pemohon');
            $table->unsignedBigInteger('id_user');
            $table->string('nip')->unique();
            $table->string('nik')->unique();
            $table->string('jabatan');
            $table->string('opd');
            $table->string('no_telepon');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemohon');
    }
}
