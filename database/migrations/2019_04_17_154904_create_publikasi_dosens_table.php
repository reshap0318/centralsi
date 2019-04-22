<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublikasiDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasi_dosen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('publikasi_id');
            $table->integer('posisi'); //1st , 2nd, 3rd, 4th author
            $table->timestamps();

            $table->foreign('dosen_id')->references('id')->on('dosen');
            $table->foreign('publikasi_id')->references('id')->on('publikasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publikasi_dosen');
    }
}
