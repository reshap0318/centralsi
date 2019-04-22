<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_akhir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('konsentrasi_id');
            $table->string('judul');
            $table->text('sinopsis')->nullable();
            $table->integer('status_ta')->default(0); //0: Tidak Aktif, 1: Aktif,
            $table->date('registered_at')->nullable();
            $table->date('proposal_deadline_at')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('konsentrasi_id')->references('id')->on('ref_konsentrasi_ta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_akhir');
    }
}
