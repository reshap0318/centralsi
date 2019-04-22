<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengujiSemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ta_penguji_semhas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ta_semhas_id');
            $table->unsignedBigInteger('dosen_id');
            $table->integer('bersedia')->default(1); //0:Tidak bersedia, 1:Bersedia
            $table->timestamps();

            $table->foreign('ta_semhas_id')->references('id')->on('ta_semhas');
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
        Schema::dropIfExists('ta_penguji_semhas');
    }
}
