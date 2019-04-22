<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenelitiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penelitian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->integer('tahun');
            $table->integer('lama_tahun')->default(1);
            $table->integer('total_dana');
            $table->unsignedBigInteger('skema_penelitian_id')->nullable();
            $table->unsignedBigInteger('sumber_dana_id')->nullable();
            $table->string('file_kontrak')->nullable();
            $table->string('file_laporan')->nullable();
            $table->timestamps();

            $table->foreign('skema_penelitian_id')->references('id')->on('ref_skema_penelitian');
            $table->foreign('sumber_dana_id')->references('id')->on('ref_sumber_dana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penelitian');
    }
}
