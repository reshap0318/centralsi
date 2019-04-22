<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaSemprosTable extends Migration
{
    public function up()
    {
        Schema::create('ta_sempro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tugas_akhir_id');
            $table->date('sempro_at')->nullable();
            $table->time('sempro_time')->nullable();
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->integer('proposal_status')->nullable(); //0: gagal, 1:selesai
            $table->string('nilai_huruf')->nullable();
            $table->string('file_proposal')->nullable();
            $table->date('semhas_deadline_at')->nullable();
            $table->timestamps();

            $table->foreign('tugas_akhir_id')->references('id')->on('tugas_akhir');
            $table->foreign('ruangan_id')->references('id')->on('ruangan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ta_sempro');
    }
}
