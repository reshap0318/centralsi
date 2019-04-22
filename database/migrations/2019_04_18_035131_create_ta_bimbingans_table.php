<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ta_bimbingan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tugas_akhir_id');
            $table->unsignedBigInteger('pembimbing_id');
            $table->date('tanggal');
            $table->string('progress');
            $table->string('catatan')->nullable(0);
            $table->string('file')->nullable();
            $table->integer('status_bimbingan')->default(1); //1:selesai, 2: revisi, 3:ditolak:
            $table->timestamps();

            $table->foreign('tugas_akhir_id')->references('id')->on('tugas_akhir');
            $table->foreign('pembimbing_id')->references('id')->on('ta_pembimbing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ta_bimbingan');
    }
}
