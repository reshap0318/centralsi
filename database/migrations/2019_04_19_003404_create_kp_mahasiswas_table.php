<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kp_mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kp_proposal_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->text('bidang_usulan');
            $table->integer('status_kp')->default(1);
            $table->date('mulai_at')->nullable();
            $table->date('selesai_at')->nullable();
            $table->unsignedBigInteger('pembimbing_id')->nullable();
            $table->string('judul_laporan')->nulalble();
            $table->date('seminar_deadline_at')->nullable();
            $table->date('seminar_at')->nullable();
            $table->time('seminar_time')->nullable();
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->string('file_laporan_kp')->nullable();
            $table->string('file_tanda_terima')->nullable();
            $table->string('file_nilai_lapangan')->nullable();
            $table->string('file_absen_seminar')->nullable();
            $table->string('file_ba_seminar')->nullable();
            $table->string('file_logbook')->nullable();
            $table->string('file_sertifikat')->nullable();
            $table->timestamps();

            $table->foreign('kp_proposal_id')->references('id')->on('kp_proposal');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('pembimbing_id')->references('id')->on('dosen');
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
        Schema::dropIfExists('kp_mahasiswa');
    }
}
