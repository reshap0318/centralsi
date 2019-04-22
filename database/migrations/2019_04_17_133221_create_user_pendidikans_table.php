<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPendidikansTable extends Migration
{

    public function up()
    {
        Schema::create('user_pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jenjang_id');
            $table->string('nama_sekolah');
            $table->string('jurusan')->nullable();
            $table->integer('tahun_masuk')->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->integer('dalam_negeri')->nullable();
            $table->string('lokasi_sekolah')->nullable();
            $table->string('nomor_ijazah')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jenjang_id')->references('id')->on('ref_jenjang_pendidikan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_pendidikan');
    }
}
