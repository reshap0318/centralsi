<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaSemhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ta_semhas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ta_sempro_id');
            $table->date('semhas_at')->nullable();
            $table->time('semhas_time')->nullable();
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('rekomendasi')->nullable();
            $table->date('sidang_deadline_at')->nullable();
            $table->string('file_ba_seminar')->nullable();
            $table->string('file_laporan_ta')->nullable();
            $table->timestamps();

            $table->foreign('ta_sempro_id')->references('id')->on('ta_sempro');
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
        Schema::dropIfExists('ta_semhas');
    }
}
