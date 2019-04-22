<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosenFungsionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen_fungsional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('fungsional_id');
            $table->date('tmt')->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->string('nomor_sk')->nullable();
            $table->string('file_sk')->nullable();
            $table->timestamps();

            $table->foreign('dosen_id')->references('id')->on('dosen');
            $table->foreign('fungsional_id')->references('id')->on('ref_fungsional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen_fungsional');
    }
}
