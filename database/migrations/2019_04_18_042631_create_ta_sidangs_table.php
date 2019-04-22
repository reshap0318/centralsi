<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ta_sidang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ta_semhas_id');
            $table->date('sidang_at')->nullable();
            $table->time('sidang_time')->nullable();
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->integer('status')->default(0); //0 : Diajukan, 10:Pengajuan Diterima, 11: Menunggu Sidang, 12:Selesai, 13:Batal, 14:Gagal, 20: Pengajuan Ditolak
            $table->double('nilai_angka')->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->integer('nilai_toefl')->nullable();
            $table->string('file_toefl')->nullable();
            $table->string('file_laporan')->nullable();
            $table->string('file_lembaran_pengesahan')->nullable();
            $table->string('nilai_akhir_ta')->nullable();
            $table->timestamps();

            $table->foreign('ta_semhas_id')->references('id')->on('ta_semhas');
            $table->foreign('ruangan_id')->references('id')->on('ruangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ta_sidang');
    }
}
