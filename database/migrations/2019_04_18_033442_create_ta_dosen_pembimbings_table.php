<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaDosenPembimbingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ta_pembimbing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('tugas_akhir_id');
            $table->integer('jabatan')->default(1); //1: pembimbing utama, 2: pembimbing pendamping
            $table->integer('status')->default(0); //0: ditolak, 1, disetujui, 2: dalam antrian
            $table->timestamps();

            $table->foreign('dosen_id')->references('id')->on('dosen');
            $table->foreign('tugas_akhir_id')->references('id')->on('tugas_akhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ta_pembimbing');
    }
}
