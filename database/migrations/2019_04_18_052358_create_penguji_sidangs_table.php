<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengujiSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ta_penguji_sidang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ta_sidang_id');
            $table->unsignedBigInteger('dosen_id');
            $table->integer('jabatan')->nullable(); //1:Ketua Sidang, 2:Anggota Sidang
            $table->integer('bersedia')->default(1); //0:Tidak bersedia, 1:Bersedia
            $table->timestamps();

            $table->foreign('ta_sidang_id')->references('id')->on('ta_sidang');
            $table->foreign('dosen_id')->references('id')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ta_penguji_sidang');
    }
}
